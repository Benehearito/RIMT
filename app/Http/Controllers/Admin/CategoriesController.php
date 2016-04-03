<?php

namespace App\Http\Controllers\Admin;

use App\Models\Albums;
use App\Models\Categories;
use App\Models\Images_Categories;
use App\Models\Products;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories_base =Categories::whereNull('category_id')->orWhere('category_id', '=', 0)->orderBy('order', 'asc')->get();
        $categories= array();
        foreach ($categories_base as $category) {
            $categories[$category->id]['data']=$category;
            $categories_child =  $category->children();
            if (!empty($categories_child)){
                $categories[$category->id]['children'] = $this->CargaArbolCategorias ($category);
            }
        }
        return view('admin.categories.index')->with(compact('categories'));
    }

    private function CargaArbolCategorias ($category_father){
        $categories_base =  $category_father->children()->orderBy('order', 'asc')->get();
        $categories= array();
        foreach ($categories_base as $category)
        {
            $categories[$category->id]['data']=$category;
            $categories_child =  $category->children()->orderBy('order', 'asc')->get();
            if (!empty($categories_child)){
                $categories[$category->id]['children'] = $this->CargaArbolCategorias ($category);
                // array_push($categories[$category->id]['children'],);
            }

        }
        return  $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Categories::orderBy('title_es', 'asc')->get();
        $categories = array_pluck($categories, 'attributes.title_es', 'attributes.id'); // funcion para estrer datos y crear un array nuevo
        return view('admin.categories.create')->with('categories', $categories);
    }


    public function store(Requests\CategoryRequest $request)
    {
        try {
            $category =Categories::create($request->all());
            if ($category->category_id==0){
                $category->category_id=null;
            }
            $max_order = Categories::Bycategory($category->category_id)->max('order');;
            $category->order= $max_order+1;
            $category->save();
            return redirect()->route('admin.categories.edit', array('id' => $category->id))
                ->with('message', 'Categoría creada');
        }catch (QueryException $e){
            return redirect()->route('admin.categories.create')
                             ->with('alert', 'No se pudo crear la categoria');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::findOrFail($id);
        $categories =Categories::orderBy('title_es', 'asc')->get();
        $categories = array_pluck($categories, 'attributes.title_es', 'attributes.id'); // funcion para estrer datos y crear un array nuevo
        $products = Products::category($id)->orderBy('order', 'asc')->get();
        $albums =Albums::has('images')->orderBy('title_es', 'asc')->get();
        $albums = array_pluck($albums, 'attributes.title_es', 'attributes.id'); // funcion para estrer datos y crear un array nuevo
        return view('admin.categories.edit')
            ->with(compact('category'))
            ->with('categories', $categories)
            ->with('products', $products)
            ->with('albums', $albums);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CategoryRequest $request, $id)
    {
        try {
            $category = Categories::find( $id);
            $category->update($request->all());
            return redirect()->route('admin.categories.edit', array('id' => $category->id))
                ->with('message', 'Categoría actualizada');
        }catch (QueryException $e){
            return redirect()->route('admin.categories.edit', array('id' => $category->id))
                ->with('alert', 'No se pudo actualizar la categoría');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Categories::find($request->get('id'));
        if ($category->category_id !=null){
            $parent =$category->parent()->get();
            $children =$category->children()->get();
            if (!empty($children)) {
                foreach ($children as $child) {
                    $child = Categories::find($child->id);
                    $child->category_id = $parent[0]['id'];
                    $child->save();
                }
            }
        }
        Images_Categories::category($request->get('id'))->delete();

        Products::category($request->get('id'))->update(['category_id' => 0]);

        $category->delete();

        if ($request->ajax())
        {
            return response()->json(
                [
                    'success'     =>'ok',
                    'menssage'    => 'Categoria eleminida'
                ]
            );
        }

        return redirect()->route('admin.categories.index')->with('message','Categoria eleminida');
    }

    /**
     * @param Request $request
     */
    public function saveorder (Request $request)
    {
        $save_order = json_decode($request->get('save_order'), true);
        $this->RecorrerJsonArray ($save_order[0], null);

        if ($request->ajax())
        {
            return response()->json(
                [
                    'success'     =>'ok',
                    'menssage'    => 'Orden actualizado'
                ]
            );
        }

        return redirect()->route('admin.categories.index')->with('message', 'Orden actualizado');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function  activate (Request $request)
    {

        $category = Categories::find($request->get('id'));

        if ($category->active){
            $category->active = 0;
            $menssage = $category->title_es.'  fue descativado';
        }else{

            $category->active = 1;
            $menssage = $category->title_es.'  fue activado';
        }
        $category->save();

        if ($request->ajax())
        {
            return response()->json(
                [
                    'success'     =>  'ok',
                    'id'          =>  $category->id,
                    'menssage'    =>  $menssage
                ]
            );
        }

        return redirect()->route('admin.categories.index')->with('message', $menssage);

    }

    /**
     * @param $array
     * @return bool
     */
    private function RecorrerJsonArray ($array,$id_padre)
    {

        foreach ($array as $indice => $valor) {
            $category = Categories::find($valor['id']);
            $category->order =$indice;
            $category->category_id =$id_padre;
            $category->save();

            if (!empty($valor['children'][0])) {
                $this->RecorrerJsonArray ($valor['children'][0],$valor['id']);

            }
        }
        return true;
    }


}

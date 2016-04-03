<?php

namespace App\Http\Controllers\Admin;

use App\Models\Albums;
use App\Models\Categories;
use App\Models\Images_Products;
use App\Models\OrderProducts;
use App\Models\Products;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{

    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request)
    {
        $find_name=$request->get('name');
        $find_category=$request->get('category');

        $products_consult =Products::with('parent');

        if ($find_category>0){
            $products_consult->category($find_category);
        }elseif ($find_category!=''){
            $products_consult->category(0);
        }

        if ($find_name!=''){
            $products_consult->name($find_name);
        }

        $products_consult->orderBy('category_id', 'asc')->orderBy('order', 'asc');
        $products = $products_consult->paginate();

        $categories =Categories::has('products')->orderBy('title_es', 'asc')->get();
        $categories = array_pluck($categories, 'attributes.title_es', 'attributes.id'); // funcion para estrer datos y crear un array nuevo

        return view('admin.products.index')
            ->with('find_name',  $find_name)
            ->with('find_category',  $find_category)
            ->with('categories',  $categories)
            ->with(compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::orderBy('title_es', 'asc')->get();
        $categories = array_pluck($categories, 'attributes.title_es', 'attributes.id'); // funcion para estrer datos y crear un array nuevo
/*
        if ($request->get('category')!=''){
            $find_category=$request->get('category');
        }else{
            $find_category=null; ->with('find_category', $find_category);
        }*/
        return view('admin.products.create')
            ->with('categories', $categories);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CategoryRequest $request)
    {
        try {
            $product =Products::create($request->all());
            if ($product->category_id==0){
                $product->category_id=null;
            }
            if ($product->category_id>0){
                $max_order = Products::category($product->category_id)->max('order');;
                $product->order= $max_order+1;
                $product->save();
            }

            return redirect()->route('admin.products.edit', array('id' => $product->id))
                ->with('message', 'Producto creado');
        }catch (QueryException $e){
            return redirect()->route('admin.products.create')
                ->with('alert', 'No se pudo crear el producto');
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
        $product = Products::findOrFail($id);
        $categories = Categories::orderBy('title_es', 'asc')->get();
        $categories = array_pluck($categories, 'attributes.title_es', 'attributes.id'); // funcion para estrer datos y crear un array nuevo
        $albums =Albums::has('images')->orderBy('title_es', 'asc')->get();
        $albums = array_pluck($albums, 'attributes.title_es', 'attributes.id'); // funcion para estrer datos y crear un array nuevo
        $products = '';
        $category_parent='';
        if ($product->category_id>0){
            $category_parent= Categories::findOrFail($product->category_id);
            $products = Products::category($product->category_id)->orderBy('order', 'asc')->get();
        }

        return view('admin.products.edit')
            ->with('albums', $albums)
            ->with('product', $product)
            ->with('products', $products)
            ->with('category_parent', $category_parent)
            ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (Requests\ProductRequest $request, $id)
    {
        try {
            $product = Products::find( $id);
            $category_temp = $product->category_id;
            $product->update($request->all());

            if ($product->category_id!=$category_temp){
                $max_order = Products::category($product->category_id)->max('order');
                $product->order= $max_order+1;
                $product->save();
            }


            return redirect()->route('admin.products.edit', array('id' => $product->id))
                ->with('message', 'Producto actualizado');
        }catch (QueryException $e){
            return redirect()->route('admin.products.edit', array('id' => $product->id))
                ->with('alert', 'No se pudo actualizar el producto');
        }
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $product = Products::find($request->get('id'));

        Images_Products::product($request->get('id'))->delete();

        OrderProducts::Byproduct($request->get('id'))->update(['product_id' => 0]);

        $product->delete();

        if ($request->ajax())
        {
            return response()->json(
                [
                    'success'     =>'ok',
                    'menssage'    => 'Producto eleminado'
                ]
            );
        }

        return redirect()->route('admin.products.index')->with('message','Producto eleminado');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function  activate (Request $request)
    {

        $product = Products::find($request->get('id'));

        if ($product->active){
            $product->active = 0;
            $menssage = $product->title_es.'  fue descativado';
        }else{

            $product->active = 1;
            $menssage = $product->title_es.'  fue activado';
        }
        $product->save();

        if ($request->ajax())
        {
            return response()->json(
                [
                    'success'     =>  'ok',
                    'id'          =>  $product->id,
                    'menssage'    =>  $menssage
                ]
            );
        }

        return redirect()->route('admin.products.index')->with('message', $menssage);

    }

    /**
     * @param Request $request
     */
    public function saveorder (Request $request)
    {
        $save_order = $array = explode(',', $request->get('save_order'));
        $this->RecorrerJsonArray ($save_order);

        if ($request->ajax())
        {
            return response()->json(
                [
                    'success'     =>'ok',
                    'menssage'    => 'Orden actualizado'
                ]
            );
        }

        return redirect()->route('admin.products.index')->with('message', 'Orden actualizado');
    }

    /**
     * @param $array
     * @return bool
     */
    private function RecorrerJsonArray ($array)
    {

        foreach ($array as $indice => $valor) {
            $category = Products::find($valor);
            $category->order =$indice+1;
            $category->save();

        }
        return true;
    }
}

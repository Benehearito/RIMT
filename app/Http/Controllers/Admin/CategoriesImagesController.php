<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Models\Images;
use App\Models\Images_Categories;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriesImagesController extends Controller
{
    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request)
    {

        $images = Images::album($request->get('id'))->orderBy('order', 'asc')->get();
        return view('admin.categoriesimages.index')->with('images',  $images);
    }

    /**
     * @param $id
     */
    public function cjt_images($id){
        $category = Categories::with('images')->find($id);

        return view('admin.categoriesimages.cjto_images')
            ->with('category',  $category);
    }

    /**
     * @param Request $request
     */
    public function cjt_images_saveorder (Request $request)
    {

        $save_order  = explode(',', $request->get('save_order_images'));
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

        return redirect()->route('admin.categories.index')->with('message', 'Orden actualizado');
    }

    /**
     * @param Request $request
     */
    public function addimages (Request $request)
    {

        $addimages  = explode(',', $request->get('add_images'));
        if (count($addimages)>0){
            $category =Categories::findOrFail($request->get('category_id'));
            $max_order = Images_Categories::category($request->get('category_id'))->max('order');
            if (is_null($max_order)){
                $max_order = 1;
            }else{
                $max_order += 1;
            }
            foreach ($addimages as $indice => $valor) {
                if ( !$category->images->contains($valor) ){
                    $category->images()->attach($valor, ['order' => $max_order]);
                    $max_order += 1;
                }

            }
        }

        if ($request->ajax())
        {
            return response()->json(
                [
                    'success'     =>'ok',
                    'menssage'    => 'Imagenes añadidas'
                ]
            );
        }

        return redirect()->route('admin.categories.edit',array('id' => $request->get('category_id')))->with('message', 'Imagenes añadidas');
    }

    /**
     * @param $array
     * @return bool
     */
    private function RecorrerJsonArray ($array)
    {

        foreach ($array as $indice => $valor) {
            $pivot = Images_Categories::find($valor);
            $pivot->order =$indice+1;
            $pivot->save();

        }
        return true;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $image_category = Images_Categories::find($request->get('pivot_id'));

        $image_category->delete();

        if ($request->ajax())
        {
            return response()->json(
                [
                    'success'     =>'ok',
                    'menssage'    => 'Imagen eleminada de la categoria'
                ]
            );
        }

        return redirect()->route('admin.categories.index')->with('message','Imagen eliminada de la categoria');
    }
}

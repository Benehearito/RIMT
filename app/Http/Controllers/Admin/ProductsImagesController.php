<?php

namespace App\Http\Controllers\Admin;


use App\Models\Images;
use App\Models\Images_Products;
use App\Models\Products;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsImagesController extends Controller
{


    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request)
    {

        $images = Images::album($request->get('id'))->orderBy('order', 'asc')->get();
        return view('admin.productsimages.index')->with('images',  $images);

    }

    /**
     * @param $id
     */
    public function cjt_images($id){
        $product = Products::with('images')->find($id);

        return view('admin.productsimages.cjto_images')
            ->with('product',  $product);
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

        return redirect()->route('admin.products.index')->with('message', 'Orden actualizado');
    }

    /**
     * @param Request $request
     */
    public function addimages (Request $request)
    {

        $addimages  = explode(',', $request->get('add_images'));
        if (count($addimages)>0){
            $product =Products::findOrFail($request->get('product_id'));
            $max_order = Images_Products::product($request->get('product_id'))->max('order');
            if (is_null($max_order)){
                $max_order = 1;
            }else{
                $max_order += 1;
            }
            foreach ($addimages as $indice => $valor) {
                if ( !$product->images->contains($valor) ){
                    $product->images()->attach($valor, ['order' => $max_order]);
                    $max_order += 1;
                }

            }
        }


        //$this->RecorrerJsonArray ($save_order);


        if ($request->ajax())
        {
            return response()->json(
                [
                    'success'     =>'ok',
                    'menssage'    => 'Imagenes añadidas'
                ]
            );
        }

        return redirect()->route('admin.products.edit',array('id' => $request->get('product_id')))->with('message', 'Imagenes añadidas');
    }

    /**
     * @param $array
     * @return bool
     */
    private function RecorrerJsonArray ($array)
    {

        foreach ($array as $indice => $valor) {
            $pivot = Images_Products::find($valor);
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
        $image_product = Images_Products::find($request->get('pivot_id'));

        $image_product->delete();

        if ($request->ajax())
        {
            return response()->json(
                [
                    'success'     =>'ok',
                    'menssage'    => 'Imagen eleminada del producto'
                ]
            );
        }

        return redirect()->route('admin.products.index')->with('message','Imagen eliminada del producto');
    }
}

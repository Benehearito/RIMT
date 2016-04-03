<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Http\Requests;


class ShopController extends Controller
{
    public function index  ()
    {
        $categories_base =Categories::active()->base()->orderBy('order', 'asc')->get();
        $categories= array();
        foreach ($categories_base as $category) {
            $categories[$category->id]['data']=$category->toArray();
            $categories_child =  $category->children()->active();
            if (!empty($categories_child)){
                $categories[$category->id]['children'] = $this->CargaArbolCategorias ($category);
            }

          /*  $products = $category->products()->active()->get();
            dd ( $products);
            if (!empty($products)) {
                $categories[$category->id]['products']= $products;
            }*/
        }
        return view('web.shop.index')->with('cjtshop', $categories);
        //dd ( $categories);
    }

    private function CargaArbolCategorias ($category_father){
        $categories_base =  $category_father->children()->active()->orderBy('order', 'asc')->get();
        $categories= array();
        foreach ($categories_base as $category)
        {
            $categories[$category->id]['data']=$category->toArray();
            $categories_child =  $category->children()->active();
            if (!empty($categories_child)){
                $categories[$category->id]['children'] = $this->CargaArbolCategorias ($category);
                // array_push($categories[$category->id]['children'],);
            }

            $products = $category->products()->active()->get();
            if (!empty($products)) {
                $categories[$category->id]['products']= $products->toArray();
            }

        }
        return  $categories;
    }
    /**
     *
     */
    public function index2  (){
        return view('admin.categories.index')->with(compact('categories'));
        $products_consult =Products::with('parent')->get()->toArray();
        dd( $products_consult);
        return view('web.shop.index');
    }

}

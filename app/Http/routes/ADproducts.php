<?php

Route::group(['prefix' => 'products', 'middleware' => 'role:comercial'], function (){
    Route::get('', [
    'uses' => 'Admin\ProductsController@index',
    'as'   => 'admin.products.index'
    ]);

    Route::get('create', [
    'uses' => 'Admin\ProductsController@create',
    'as'   => 'admin.products.create'
    ]);
    Route::post('store', [
    'uses' => 'Admin\ProductsController@store',
    'as'   => 'admin.products.store'
    ]);
    Route::get('edit/{id}', [
    'uses' => 'Admin\ProductsController@edit',
    'as'   => 'admin.products.edit'
    ]);

    Route::put('update/{id}', [
    'uses' => 'Admin\ProductsController@update',
    'as'   => 'admin.products.update'
    ]);

    Route::post('saveorder', [
    'uses' => 'Admin\ProductsController@saveorder',
    'as'   => 'admin.products.saveorder'
    ]);

    Route::post('activate', [
    'uses' => 'Admin\ProductsController@activate',
    'as'   => 'admin.products.activate'
    ]);

    Route::delete('delete', [
    'uses' => 'Admin\ProductsController@destroy',
    'as'   => 'admin.products.delete'
    ]);
});

Route::group(['prefix' => 'productsimages', 'middleware' => 'role:comercial'], function (){
    Route::get('', [
        'uses' => 'Admin\ProductsImagesController@index',
        'as'   => 'admin.imagesproducts.addimagesproduct'
    ]);
    Route::get('cjt_images/{id?}', [
        'uses' => 'Admin\ProductsImagesController@cjt_images',
        'as'   => 'admin.imagesproducts.cjt_images'
    ]);
    Route::post('cjt_images_saveorder', [
        'uses' => 'Admin\ProductsImagesController@cjt_images_saveorder',
        'as'   => 'admin.imagesproducts.cjt_images_saveorder'
    ]);

    Route::post('addimages', [
        'uses' => 'Admin\ProductsImagesController@addimages',
        'as'   => 'admin.imagesproducts.addimages'
    ]);

    Route::delete('delete', [
        'uses' => 'Admin\ProductsImagesController@destroy',
        'as'   => 'admin.imagesproducts.cjt_images_delete'
    ]);

});
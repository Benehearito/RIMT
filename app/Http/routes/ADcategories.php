<?php

Route::group(['prefix' => 'categories', 'middleware' => 'role:comercial'], function (){
    Route::get('', [
        'uses' => 'Admin\CategoriesController@index',
        'as'   => 'admin.categories.index'
    ]);

    Route::get('create', [
        'uses' => 'Admin\CategoriesController@create',
        'as'   => 'admin.categories.create'
    ]);
    Route::post('store', [
        'uses' => 'Admin\CategoriesController@store',
        'as'   => 'admin.categories.store'
    ]);
    Route::get('edit/{id}', [
        'uses' => 'Admin\CategoriesController@edit',
        'as'   => 'admin.categories.edit'
    ]);

    Route::put('update/{id}', [
        'uses' => 'Admin\CategoriesController@update',
        'as'   => 'admin.categories.update'
    ]);

    Route::post('saveorder', [
        'uses' => 'Admin\CategoriesController@saveorder',
        'as'   => 'admin.categories.saveorder'
    ]);

    Route::post('activate', [
        'uses' => 'Admin\CategoriesController@activate',
        'as'   => 'admin.categories.activate'
    ]);

    Route::delete('delete', [
        'uses' => 'Admin\CategoriesController@destroy',
        'as'   => 'admin.categories.delete'
    ]);
});

Route::group(['prefix' => 'categoriesimages', 'middleware' => 'role:comercial'], function (){
    Route::get('', [
        'uses' => 'Admin\CategoriesImagesController@index',
        'as'   => 'admin.imagescategories.addimagescategory'
    ]);
    Route::get('cjt_images/{id?}', [
        'uses' => 'Admin\CategoriesImagesController@cjt_images',
        'as'   => 'admin.imagescategories.cjt_images'
    ]);
    Route::post('cjt_images_saveorder', [
        'uses' => 'Admin\CategoriesImagesController@cjt_images_saveorder',
        'as'   => 'admin.imagescategories.cjt_images_saveorder'
    ]);

    Route::post('addimages', [
        'uses' => 'Admin\CategoriesImagesController@addimages',
        'as'   => 'admin.imagescategories.addimages'
    ]);

    Route::delete('delete', [
        'uses' => 'Admin\CategoriesImagesController@destroy',
        'as'   => 'admin.imagescategories.cjt_images_delete'
    ]);

});
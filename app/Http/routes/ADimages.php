<?php

Route::group(['prefix' => 'images', 'middleware' => 'role:comercial'], function (){
    Route::get('', [
        'uses' => 'Admin\ImagesController@index',
        'as'   => 'admin.images.index'
    ]);



    Route::get('create/{id?}', [
        'uses' => 'Admin\ImagesController@create',
        'as'   => 'admin.images.create'
    ]);

    Route::post('store', [
        'uses' => 'Admin\ImagesController@store',
        'as'   => 'admin.images.store'
    ]);


    Route::post('saveorder', [
        'uses' => 'Admin\ImagesController@saveorder',
        'as'   => 'admin.images.saveorder'
    ]);

    Route::delete('delete', [
        'uses' => 'Admin\ImagesController@destroy',
        'as'   => 'admin.images.delete'
    ]);

    Route::get('albumimages', [
        'uses' => 'Admin\ImagesController@albumimages',
        'as'   => 'admin.images.albumimages'
    ]);

});
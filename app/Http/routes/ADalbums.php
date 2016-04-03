<?php

Route::group(['prefix' => 'albums', 'middleware' => 'role:comercial'], function (){
    Route::get('', [
        'uses' => 'Admin\AlbumsController@index',
        'as'   => 'admin.albums.index'
    ]);

    Route::get('create', [
        'uses' => 'Admin\AlbumsController@create',
        'as'   => 'admin.albums.create'
    ]);
    Route::post('store', [
        'uses' => 'Admin\AlbumsController@store',
        'as'   => 'admin.albums.store'
    ]);
    Route::get('edit/{id}', [
        'uses' => 'Admin\AlbumsController@edit',
        'as'   => 'admin.albums.edit'
    ]);

    Route::put('update/{id}', [
        'uses' => 'Admin\AlbumsController@update',
        'as'   => 'admin.albums.update'
    ]);

    Route::post('saveorder', [
        'uses' => 'Admin\AlbumsController@saveorder',
        'as'   => 'admin.albums.saveorder'
    ]);

    Route::delete('delete', [
        'uses' => 'Admin\AlbumsController@destroy',
        'as'   => 'admin.albums.delete'
    ]);
});
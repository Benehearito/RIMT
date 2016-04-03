<?php

Route::group(['prefix' => 'users', 'middleware' => 'role:admin'], function (){
    // ADMIN USERS Routes...
    Route::get('', [
        'uses' => 'Admin\UsersController@index',
        'as'   => 'admin.users.index'
    ]);

    Route::get('create', [
        'uses' => 'Admin\UsersController@create',
        'as'   => 'admin.users.create'
    ]);

    Route::post('store', [
        'uses' => 'Admin\UsersController@store',
        'as'   => 'admin.users.store'
    ]);

    Route::get('edit/{id}', [
        'uses' => 'Admin\UsersController@edit',
        'as'   => 'admin.users.edit'
    ]);

    Route::put('update/{id}', [
        'uses' => 'Admin\UsersController@update',
        'as'   => 'admin.users.update'
    ]);

    Route::post('ban', [
        'uses' => 'Admin\UsersController@ban',
        'as'   => 'admin.users.ban'
    ]);

    Route::delete('delete', [
        'uses' => 'Admin\UsersController@destroy',
        'as'   => 'admin.users.delete'
    ]);

});
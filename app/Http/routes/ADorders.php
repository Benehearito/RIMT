<?php
/**
 * Created by PhpStorm.
 * User: yfenc
 * Date: 08/03/2016
 * Time: 17:44
 */
Route::group(['prefix' => 'orders', 'middleware' => 'role:comercial'], function (){
    Route::get('', [
        'uses' => 'Admin\OrdersController@index',
        'as'   => 'admin.orders.index'
    ]);

    Route::get('create', [
        'uses' => 'Admin\OrdersController@create',
        'as'   => 'admin.orders.create'
    ]);
    Route::post('store', [
        'uses' => 'Admin\OrdersController@store',
        'as'   => 'admin.orders.store'
    ]);
    Route::get('edit/{id}', [
        'uses' => 'Admin\OrdersController@edit',
        'as'   => 'admin.orders.edit'
    ]);

    Route::put('update/{id}', [
        'uses' => 'Admin\OrdersController@update',
        'as'   => 'admin.orders.update'
    ]);

    Route::post('saveorder', [
        'uses' => 'Admin\OrdersController@saveorder',
        'as'   => 'admin.orders.saveorder'
    ]);

    Route::post('activate', [
        'uses' => 'Admin\OrdersController@activate',
        'as'   => 'admin.orders.activate'
    ]);

    Route::delete('delete', [
        'uses' => 'Admin\OrdersController@destroy',
        'as'   => 'admin.orders.delete'
    ]);
});
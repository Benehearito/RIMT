<?php
/**
 * Created by PhpStorm.
 * User: yfenc
 * Date: 08/03/2016
 * Time: 17:48
 */
// Authentication Routes...
Route::get('login', [
    'uses' => 'AuthClientsController@showLoginForm',
    'as'   => 'login'
]);
Route::post('login', 'AuthClientsController@login');
Route::get('logout',  [
    'uses' => 'AuthClientsController@logout',
    'as'   => 'logout'
]);

// Registration Routes...
Route::get('register', [
    'uses' => 'AuthClientsController@showRegistrationForm',
    'as'   => 'register'
]);
Route::post('register', 'AuthClientsController@register');

Route::get ('confirmation/{token}', [
    'uses' => 'AuthClientsController@getConfirmation',
    'as'   => 'confirmation'
]);

// Password Reset Routes...
Route::get('password/reset/{token?}', [
    'uses' => 'Auth\PasswordController@showResetForm',
    'as'   => 'password_reset'
]);
Route::post('password/reset', 'Auth\PasswordController@reset');

Route::post('password/email', [
    'uses' => 'Auth\PasswordController@sendResetLinkEmail',
    'as'   => 'password_email'
]);

Route::group(['prefix' => 'acount', ['middleware' => 'auth','middleware' => 'role:cliente' ]], function (){
    Route::get('', [
        'uses' => 'AcountController@index',
        'as'   => 'acount.index'
    ]);

    Route::put('update', [
        'uses' => 'AcountController@update',
        'as'   => 'acount.update'
    ]);

    Route::put('changepassword', [
        'uses' => 'AcountController@update',
        'as'   => 'acount.changepassword'
    ]);
});
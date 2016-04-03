<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as'   => 'home'
    ]);
    Route::get('/contacto', [
        'uses' => 'HomeController@contact',
        'as'   => 'contact'
    ]);
    Route::get('/condiciones-de-uso', [
        'uses' => 'HomeController@condiciones_uso',
        'as'   => 'condiciones_uso'
    ]);
    Route::get('/aviso-legal', [
        'uses' => 'HomeController@aviso_legal',
        'as'   => 'condiciones_uso'
    ]);
    Route::get('/politica-de-cookies', [
        'uses' => 'HomeController@cookies',
        'as'   => 'cookies'
    ]);
    Route::get('/politica-de-proteccion-de-datos', [
        'uses' => 'HomeController@proteccion_datos',
        'as'   => 'proteccion_datos'
    ]);
    Route::get('/servicios', [
        'uses' => 'HomeController@servicios',
        'as'   => 'servicios'
    ]);
    Route::get('/proyectos', [
        'uses' => 'HomeController@projects',
        'as'   => 'projects'
    ]);
    Route::get('/videos', [
        'uses' => 'HomeController@videos',
        'as'   => 'servicios'
    ]);
    Route::get('/shop', [
        'uses' => 'ShopController@index',
        'as'   => 'shop'
    ]);
});

Route::group(['middleware' => 'web'], function () {

    include __DIR__ . '/routes/WEBauth.php';

    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){

        include __DIR__ . '/routes/ADusers.php';

        include __DIR__ . '/routes/ADorders.php';

        include __DIR__ . '/routes/ADcategories.php';

        include __DIR__ . '/routes/ADproducts.php';

        include __DIR__ . '/routes/ADalbums.php';

        include __DIR__ . '/routes/ADimages.php';

    });

});

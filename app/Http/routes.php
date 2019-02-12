<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['uses' =>'IndexController@show','as'=>'main']);


Route::post('home', [
    'as' => 'home',
    'uses' => 'IndexController@sendMail'
]);
Route::post('call_me', [
    'as' => 'call_me',
    'uses' => 'IndexController@call_me'
]);
Route::get('/thanks', ['uses'=>'ThanksController@show','as'=>'thanks']);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::group(['prefix'=>'admin', 'middleware'=>'auth'],function (){
    Route::get('/', function (){

        if(view()->exists('admin.index')){

            $data = ['title'=>'Панель администратора'];
            return view('admin.index', $data);
        };

    });

    Route::group(['prefix'=>'orders'],function() {
        ///admin/orders
        Route::get('/',['uses'=>'AdminOrdersController@index','as'=>'orders']);

        //admin/edit/--some id--
        Route::match(['get','post','delete'],'/edit/{order}',['uses'=>'AdminOrdersEditController@index','as'=>'ordersEdit']);
    });
    Route::resource('/colors', 'AdminColorsController' );


    Route::group(['prefix'=>'testimonals'],function() {
        ///admin/testimonals
        Route::get('/',['uses'=>'AdminTestimonalsController@index','as'=>'testimonals']);
        //admin/testimonals/add
        Route::match(['get','post'],'/add',['uses'=>'AdminTestimonalsController@index','as'=>'testimonalsAdd']);
        //admin/edit/--some id--
        Route::match(['get','post','delete'],'/edit/{testimonal}',['uses'=>'AdminTestimonalsController@index','as'=>'testimonalsEdit']);
    });
});

// Маршруты аутентификации...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Маршруты регистрации...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

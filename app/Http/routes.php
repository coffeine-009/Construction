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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',

//    'attachments' => 'AttachmentController'
]);

//- Categories -//
Route::get('/categories', 'CategoryController@index');
Route::get('/categories/create', 'CategoryController@create');
Route::post('/categories', 'CategoryController@store');
Route::get('/categories/{id}', 'CategoryController@show');
Route::get('/categories/{id}/edit', 'CategoryController@edit');
Route::post('/categories/{id}', 'CategoryController@update');
Route::get('/categories/{id}/delete', 'CategoryController@destroy');
//- Items -//
Route::get('/categories/{id}/items', 'ItemController@index');
Route::get('/items', 'ItemController@listAction');
Route::get('/items/create', 'ItemController@create');
Route::post('/items', 'ItemController@store');
Route::get('/items/{id}', 'ItemController@show');
Route::get('/items/{id}/edit', 'ItemController@edit');
Route::post('/items/{id}', 'ItemController@update');
Route::get('/items/{id}/delete', 'ItemController@destroy');
Route::delete('attachments/{id}', 'AttachmentController@destroy');

//- Composing views -//
View::composer('parts.menu', function($view){
    $service = new \App\Services\Implementation\CategoryServiceImpl();
    $view->with('categories', $service->menu());
});

View::composer('parts.carousel', function($view){
    $service = new \App\Services\Implementation\CategoryServiceImpl();
    $view->with('news', $service->menu());
});

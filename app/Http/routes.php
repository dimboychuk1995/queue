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

//Route::get('/', 'IndexController@index');
get('/', ['as' => 'index', 'uses' => 'IndexController@index']);
get('/admin', ['as' => 'admin', 'uses' => 'AdminController@index']);
post('/queue_create', ['as' => 'queue_create', 'uses' => 'IndexController@store']);
post('/queue_day_status', ['as' => 'queue_day_status', 'uses' => 'IndexController@getDay']);
//$router->resource('post', 'IndexController');

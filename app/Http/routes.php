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
post('/real_queue_create', ['as' => 'real_queue_create', 'uses' => 'AdminController@store']);
post('/queue_confirm', ['as' => 'queue_confirm', 'uses' => 'AdminController@update']);
post('/queue_day_status', ['as' => 'queue_day_status', 'uses' => 'IndexController@getDay']);
post('/admin_queue_day_status', ['as' => 'admin_queue_day_status', 'uses' => 'AdminController@getDay']);
get('/queue_test', ['as' => 'queue_test', 'uses' => 'IndexController@create']);
//$router->resource('post', 'IndexController');

<?php
Route::get('/', function () {
    return view('welcome');
});

// 登入後
Route::group(['middleware' => 'auth'], function () {
	Route::get('workbench','WorkbenchController@index');
});

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');


<?php
Route::get('/', function () {
    return view('welcome');
});

// 登入後
Route::group(['middleware' => 'auth'], function () {
	Route::get('workbench','WorkbenchController@index');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@logout');


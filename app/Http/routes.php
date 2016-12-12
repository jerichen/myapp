<?php
Route::get('/', function () {
    return view('welcome');
});

Route::get('permission','PermissionController@index');
Route::put('permission','PermissionController@getForm');

Route::get('toastr','PermissionController@toastrTest');

// test vue.js
Route::get('file','FileController@index');

// 登入後
Route::group(['middleware' => 'auth'], function () {
    
    Route::get('workbench','WorkbenchController@index');
    
    # ajax
    Route::get('workbench/ajax/{get?}','AjaxController@index');
    
    Route::group(['middleware' => 'menu'], function () {

    	# sub
    	Route::get('workbench/{sub?}','SubController@sub');
    	Route::get('workbench/{sub}/{parent?}','SubController@parent');
    	
    	# create
    	Route::post('workbench/{sub}/{parent?}','CreateController@index');
    	
    	# update
    	Route::put('workbench/{sub}/{parent?}','UpdateController@index');
    	
    	# delete
    	Route::delete('workbench/{sub}/{parent?}','DestroyController@index');
	
	});
});

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Social Login
Route::get('/login/{provider?}',[
	'uses' => 'Auth\AuthController@getSocialAuth',
	'as'   => 'auth.getSocialAuth'
]);

Route::get('/login/callback/{provider?}',[
	'uses' => 'Auth\AuthController@getSocialAuthCallback',
	'as'   => 'auth.getSocialAuthCallback'
]);


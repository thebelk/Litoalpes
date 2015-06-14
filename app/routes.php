<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', function() {
    //return View::make('hello');
    return View::make('Workorder.workorderlist');
});

Route::resource('user', 'UserController');
Route::get('user', 'UserController@index');
Route::get('user/{user}/edit', 'UserController@edit');

Route::resource('customer', 'CustomerController');
Route::get('customerlist', 'CustomerController@index');
Route::get('customer/create', 'CustomerController@create');
Route::get('customer/{userlito}/edit', 'CustomerController@edit');

Route::resource('machine', 'MachineController');
Route::get('machine', 'MachineController@index');
Route::get('machine/create', 'MachineController@create');
Route::delete('machine/{userlito}', 'MachineController@destroy');

Route::resource('workorder', 'WorkorderController');
Route::get('workorderlist', 'WorkorderController@index');
Route::get('workorder/create', 'WorkorderController@create');
Route::get('workorder/{workorder}/edit', 'WorkorderController@edit');

Route::resource('sessions', 'SessionsController');
Route::get('/usercreate', 'SessionsController@create');
Route::post('/signup', 'UserController@store');
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

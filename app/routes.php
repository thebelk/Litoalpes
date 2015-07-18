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

Route::resource('user', 'UserController');
Route::get('user', 'UserController@index');
Route::get('signup', 'UserController@create');
Route::get('user/{user}/edit', 'UserController@edit');

Route::resource('customer', 'CustomerController');
Route::get('customerlist', 'CustomerController@index');
Route::get('customer/create', 'CustomerController@create');
Route::get('customer/{customer}/profile', 'CustomerController@show');
Route::get('customer/{customer}/edit', 'CustomerController@edit');

Route::resource('quotation', 'QuotationController');
Route::get('quotationlist', 'QuotationController@index');
Route::get('quotation/create', 'QuotationController@create');
Route::get('quotation/{quotation}/edit', 'QuotationController@edit');
Route::delete('/quotation/{quotation}', 'QuotationController@destroy');

Route::resource('workorder', 'WorkorderController');
Route::get('workorderlist', 'WorkorderController@index');
Route::get('customer/{customer}/workorder/create','WorkorderController@create');
Route::get('worklist/{workorder}/ver', 'WorkorderController@show');
Route::get('workorder/{workorder}/edit', 'WorkorderController@edit');
Route::delete('/worklist/{workorder}', 'WorkorderController@destroy');

Route::resource('phonebook', 'PhonebookController');
Route::get('phonebooklist', 'PhonebookController@index');
Route::get('phonebook/create', 'PhonebookController@create');
Route::get('phonebook/{phonebook}/edit', 'PhonebookController@edit');
Route::delete('phonebook/{phonebook}', 'PhonebookController@destroy');

Route::resource('sessions', 'SessionsController');
Route::post('/signup', 'UserController@store');
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::get('/', 'SessionsController@create');

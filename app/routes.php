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
Route::delete('quotation/{userlito}', 'QuotationController@destroy');

Route::resource('workorder', 'WorkorderController');
Route::get('workorderlist', 'WorkorderController@index');
Route::get('workorder/create', 'WorkorderController@create');
Route::get('workorder/{workorder}/edit', 'WorkorderController@edit');

Route::resource('phonebook', 'PhonebookController');
Route::get('phonebooklist', 'PhonebookController@index');
Route::get('phonebook/create', 'PhonebookController@create');
Route::get('phonebook/{phonebook}/edit', 'PhonebookController@edit');
Route::delete('phonebook/{userlito}', 'PhonebookController@destroy');

Route::resource('sessions', 'SessionsController');
Route::post('/signup', 'UserController@store');
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::get('/', 'SessionsController@create');

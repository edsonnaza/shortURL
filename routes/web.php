<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'UrlController@index');
Route::resource('urls', 'UrlController', ['except'=> ['index']]);
Route::get('/{url}', 'UrlController@visit');
Route::post('urls/create', 'UrlController@create')->name('urls.create');


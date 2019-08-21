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

Route::get('/', 'FrontController@index');
Route::get('/{id}', 'FrontController@answers')->where('id', '[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}');

Route::resource('responses', 'ResponsesController');

Auth::routes();

Route::get('administration', 'Auth\LoginController@showLoginForm')->name('administration');
Route::post('administration/', 'Auth\LoginController@login');

Route::get('administration/accueil', 'FrontController@index')->middleware('auth');
Route::get('administration/questionnaire', 'FrontController@index')->middleware('auth');
Route::get('administration/responses', 'FrontController@index')->middleware('auth');

<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'indexController@index')->middleware('auth');
Route::post('/', 'indexController@finished')->middleware('auth');

Route::get('/entry', 'EntryController@entry')->middleware('auth');
Route::post('/entry', 'EntryController@create')->middleware('auth');

Route::get('/edit', 'EditController@edit')->middleware('auth');
Route::post('/edit', 'EditController@update')->middleware('auth');

Route::get('/delete', 'DeleteController@delete')->middleware('auth');
Route::post('/delete', 'DeleteController@remove')->middleware('auth');

//Route::get('/search', 'SearchController@finished')->middleware('auth');
Route::post('/searchfin', 'SearchFinController@finished')->middleware('auth');
Route::post('/search', 'SearchController@show')->middleware('auth');
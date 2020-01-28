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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/contact','ContactController@index');
Route::post('/contact','ContactController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'ArticleController@showing');

Route::get('/creat', 'ArticleController@creat')->middleware('auth');

Route::post('/creat', 'ArticleController@store')->middleware('auth');

Route::get('/article', 'ArticleController@index');

Route::get('/article/{article}', 'ArticleController@show');
Route::get('/article/{article}/edit', 'ArticleController@edit');
Route::put('/article/{article}', 'ArticleController@update');
Route::delete('/article/{article}', 'ArticleController@destroy');
Route::post('/reports/{report}', 'ArticleController@storeReport');
Route::get('/reports', 'ReportController@index');
Route::get('/reports/{report}', 'ReportController@show');


Route::post('/books', 'BookController@store');
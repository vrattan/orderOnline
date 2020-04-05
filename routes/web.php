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

Auth::routes();
// Route::get('/admin/categories', 'HomeController@any');
// Route::get('/admin/mealtime', 'HomeController@mealtime');
// Route::get('/admin/countries', 'HomeController@countries');
// Route::get('/admin/currencies', 'HomeController@currencies');
Route::get('/admin/{any}', 'HomeController@rootany')->where('any', '.*');
Route::get('/home', 'HomeController@index')->name('home');
// Route::resource('/category', 'MenuCategoriesController');
Route::resource('/task', 'TaskController');

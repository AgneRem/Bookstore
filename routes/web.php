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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/read/{id}', 'BooksController@show')->name('read');
Route::get('/reservation', 'ReservationController@store')->name('reservation')->middleware('auth');

Route::group(['middleware'=> ['auth', 'admin'], 'prefix'=>'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::resource('/authors', 'AuthorsController');
    Route::resource('/books', 'BooksController');
});

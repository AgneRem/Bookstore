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
Route::get('/home', 'HomeController@index');
Route::get('/read/{id}', 'BooksController@show')->name('read');
Route::get('/reservation/{title}', 'ReservationController@store')->name('reservation')->middleware('auth');

Route::group(['middleware'=> ['auth', 'admin'], 'prefix'=>'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/search', 'AdminController@search')->name('admin.search');
    Route::resource('/authors', 'AuthorsController');
    Route::resource('/books', 'BooksController');
    Route::resource('/reservations', 'ReservationController');

});

Route::get('public/image/{filename}', function ($filename) {
 $path = storage_path('app/public/image/' . $filename);
 if (!File::exists($path)) {
     abort(404);
 }
 $file = File::get($path);
 $type = File::mimeType($path);
 $response = Response::make($file, 200);
 $response->header("Content-Type", $type);
 return $response;
});
Route::get('{r}/public/image/{filename}', function ($r,$filename) {
 $path = storage_path('app/public/image/' . $filename);
 if (!File::exists($path)) {
     abort(404);
 }
 $file = File::get($path);
 $type = File::mimeType($path);
 $response = Response::make($file, 200);
 $response->header("Content-Type", $type);
 return $response;
});

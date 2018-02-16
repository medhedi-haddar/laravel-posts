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

Route::get('/', 'FrontController@index')->name('home');
Route::get('/type/{type}', 'FrontController@postByType')->name('type');
Route::get('/post/{id}', 'FrontController@show')->name('show');
Route::resource('/contactus', 'ContactController');


Route::get('/contact', function(){
    return new App\Mail\Contact(['hedi','medhdi.haddar@gmail.com']);
})->name('contact');

Route::post('/search', 'FrontController@search')->name('search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('admin/post', 'PostController')->middleware('auth');
Route::any('admin/post/update/{id}', 'PostController@updateStatus')->name('change');
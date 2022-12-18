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

Route::get('/','PostsController@index');
Route::get('/index','PostsController@index');
Route::resource('posts','PostsController');

Route::get('/image','AllController@index');
Route::get('/youtube','AllController@youtube');

Route::resource('booking','BookingController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/allposts','HomeController@allposts');
Route::get('/bookingposts','HomeController@bookingposts');

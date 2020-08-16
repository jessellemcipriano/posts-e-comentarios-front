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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/Profile', 'ProfileController@index')->name('Profile');

//Route::resource('comentario', 'ComentarioController');

Route::post('/post', 'PostController@store')->name('post.store');

Route::post('/post/{id}/comentario', 'ComentarioController@store')->name('comentario.store');
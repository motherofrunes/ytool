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

Route::get('/home/', 'HomeController@index')->name('home');

Route::resource('bbc', 'PostsController', ['only'=>['index', 'show', 'create', 'store']]);
Route::get('/category/{id}/', 'PostsController@showCategory');

Route::resource('comment', 'CommentsController', ['only'=>['store']]);
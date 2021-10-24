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

Route::get('/', 'App\http\controllers\PostController@listing');

Route::view('/post/edit', '/post/edit');
Route::view('/post/add', '/post/add');
Route::post('/post/submit', 'App\http\controllers\PostController@submit');

Route::get('/post/list', 'App\http\controllers\PostController@listing');
Route::get('/post/edit/{id}', 'App\http\controllers\PostController@edit');
Route::post('/post/update/{id}', 'App\http\controllers\PostController@update');
Route::get('/post/add/{id}', 'App\http\controllers\PostController@listing');
Route::get('/post/delete/{id}', 'App\http\controllers\PostController@delete');

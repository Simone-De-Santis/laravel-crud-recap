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

Route::delete('/movies/{movie}/delete', 'MovieController@delete')->name('movies.delete');

Route::patch('/movies/{movie}/restore', 'MovieController@restore')->name('movies.restore');

Route::get('/movies/trash', 'MovieController@trash')->name('movies.trash');

Route::resource('movies', 'MovieController');
Route::get('/', 'MovieController@index');

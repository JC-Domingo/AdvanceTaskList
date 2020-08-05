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

Route::get('/','TaskController@index')->name('home');

Route::get('/signup','SessionController@signup');
Route::post('/signup','SessionController@sign');
Route::get('/logout','SessionController@destroy');

Route::get('/login','SessionController@login');
Route::post('/login','SessionController@store');

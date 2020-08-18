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

Route::get('/','TaskController@main')->name('home');	
Route::get('/home','TaskController@main');	
Route::get('/task','TaskController@tasks');

Route::get('/profile','TaskController@profile');
Route::post('/profile','TaskController@updateInfo');
Route::get('/changepass','TaskController@changepass');
Route::post('/changepass','TaskController@updatePass');
Route::post('/update','TaskController@updated');

Route::get('/signup','SignUpController@create');
Route::post('/signup','SignUpController@sign');

Route::get('/login','SessionController@login');
Route::post('/login','SessionController@store');
Route::get('/logout','SessionController@destroy');

Route::prefix('api')->group(function() {
	Route::resource('tasks', 'TaskController');
});
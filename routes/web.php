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

Route::get('/', '\App\Http\Controllers\WelcomeController@welcome')->name('welcome');
Route::get('/show/{rozvoz_id?}', '\App\Http\Controllers\RozvozController@show')->name('rozvoz');

Route::get('/login', '\App\Http\Controllers\LoginController@login')->name('login');
Route::post('/login', '\App\Http\Controllers\LoginController@authenticate')->name('authenticate');
Route::post('/logout', '\App\Http\Controllers\LoginController@logout')->name('logout');

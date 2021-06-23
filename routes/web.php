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

Route::get('/', 'StaticPagesController@home')->name('home');
//Route::get('/signup', 'StaticPagesController@signup')->name('signup');
Route::get('/login', 'StaticPagesController@login')->name('login');
Route::get('/vision', 'StaticPagesController@vision')->name('vision');
Route::get('/about', 'StaticPagesController@about')->name('about');

Route::get('signup', 'UsersController@create')->name('signup');
Route::resource('users', 'UsersController');
Route::get('/users/{user}', 'UsersController@show')->name('users.show');
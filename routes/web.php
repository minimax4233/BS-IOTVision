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
//Route::get('/login', 'StaticPagesController@login')->name('login');
Route::get('/vision', 'StaticPagesController@vision')->name('vision');
Route::get('/about', 'StaticPagesController@about')->name('about');

// 注冊
Route::get('signup', 'UsersController@create')->name('signup'); // 创建用户的页面
//Route::resource('users', 'UsersController');
Route::get('/users/{user}', 'UsersController@show')->name('users.show'); //显示用户个人信息的页面
Route::post('/users', 'UsersController@store')->name('users.store'); // 创建用户
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit'); // 编辑用户个人资料的页面
Route::patch('/users/{user}', 'UsersController@update')->name('users.update'); // 更新用户
Route::get('/users', 'UsersController@index')->name('users.index'); // 显示所有用户列表的页面

// 登录
Route::get('login', 'SessionsController@create')->name('login'); // 显示登录页面
Route::post('login', 'SessionsController@store')->name('login'); // 创建新会话（登录）
Route::delete('logout', 'SessionsController@destroy')->name('logout'); // 销毁会话（退出登录）

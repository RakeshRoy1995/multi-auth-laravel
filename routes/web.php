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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin'], function(){ // use prefix to advoid rewritting admin again and again
      Route::get('/', 'admin\LoginController@showLoginForm')->name('admin.login');
      Route::post('/login', 'admin\LoginController@login')->name('admin.login.submit');

      Route::get('/home', 'AdminController@index');
      Route::post('logout', 'admin\LoginController@logout');
});
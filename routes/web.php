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
    return view('home');
});

Route::post('/login', 'LoginSistemController@index');
Route::get('/logout', 'LoginSistemController@logout');

# route ini digunakan untuk halaman home
Route::get('/dashboard', 'HomeController@index');

#Route untuk admin
Route::get('/datapengguna', 'DataPenggunaController@index');
Route::post('/createdatapengguna', 'DataPenggunaController@create');
Route::post('/updatedatapengguna', 'DataPenggunaController@update');
Route::get('/deletedatapengguna/{id}', 'DataPenggunaController@delete');

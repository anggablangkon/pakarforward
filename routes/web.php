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

#Route  untuk data keluhan
Route::get('/datakeluhan', 'DataKeluhanController@index');
Route::post('/createdatakeluhan', 'DataKeluhanController@create');
Route::get('/deletedatakeluhan/{id}', 'DataKeluhanController@delete');
Route::post('/updatekeluhan', 'DataKeluhanController@update');

#route untuk data solusi
Route::get('/datasolusi', 'DataSolusiController@index');
Route::post('/createdatasolusi', 'DataSolusiController@create');
Route::get('/deletedatasolusi/{id}', 'DataSolusiController@delete');
Route::post('/updatesolusi', 'DataSolusiController@update');



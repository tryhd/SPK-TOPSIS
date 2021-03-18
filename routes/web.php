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
    return view('login');
});

route::get('/login','AuthController@login')->name('login');
route::post('/login','AuthController@postLogin')->name('post.login');
route::get('/tambah','AuthController@tambah');
route::post('/tambah','UserController@posttambah')->name('input');
route::get('/home','HomeController@index')->name('home')->middleware('auth');
route::post('/logout','AuthController@logout')->name('logout');
Route::resource('/user','UserController');
route::resource('/pemain','PemainController');
route::resource('/bobot','BobotController');
route::resource('/kriteria','KriteriaController');
route::resource('/alternatif','AlternatifController');
Route::resource('/bobotkriteria', 'BobotKriteriaController');
Route::resource('/rekomendasi', 'RekomendasiController');
Route::get('/detailproses','RekomendasiController@DetailProses')->name('Proses');

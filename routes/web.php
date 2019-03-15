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


Route::get('/dashboard','adminController@dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pemesanan','adminController@pemesanan');
Route::get('/janggamekar/api/pemesanan', 'pemesananController@apiPemesanan')->name('/janggamekar/api/pemesanan');
Route::post('/janggamekar/pesananbaju/pemesanan', 'pemesananController@storePemesanan');
    Route::get('/janggamekar/pesananbaju/belumbayar', 'pemesananController@belumbayar');
    Route::get('/janggamekar/pesananbaju/sudahbayar', 'pemesananController@sudahbayar');
    Route::get('/janggamekar/{id}/edit', 'pemesananController@edit');
    Route::put('/janggamekar/{id}', 'pemesananController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

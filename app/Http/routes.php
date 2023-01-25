<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Jenis Komoditas
Route::get('jenis-komoditas/index', 'JenisKomoditasController@index')->name('jenis_komoditas.index');
Route::post('jenis-komoditas/store', 'JenisKomoditasController@store');
Route::get('jenis-komoditas/edit/{id}', 'JenisKomoditasController@edit');
Route::post('jenis-komoditas/update/{id}', 'JenisKomoditasController@update');
Route::delete('jenis-komoditas/destroy/{id}', 'JenisKomoditasController@destroy')->name('jenis_komoditas.destroy');

//Komoditas
Route::get('komoditas/index', 'KomoditasController@index')->name('komoditas.index');
Route::post('komoditas/store', 'KomoditasController@store');
Route::get('komoditas/edit/{id}', 'KomoditasController@edit');
Route::post('komoditas/update/{id}', 'KomoditasController@update');
Route::delete('komoditas/destroy/{id}', 'KomoditasController@destroy')->name('komoditas.destroy');

//Produk
Route::get('produk/index', 'ProdukController@index')->name('produk.index');
Route::post('produk/store', 'ProdukController@store');
Route::get('produk/edit/{id}', 'ProdukController@edit');
Route::post('produk/update/{id}', 'ProdukController@update');
Route::delete('produk/destroy/{id}', 'ProdukController@destroy')->name('produk.destroy');

//Perusahaan
Route::get('perusahaan/index', 'PerusahaanController@index')->name('perusahaan.index');
Route::post('perusahaan/store', 'PerusahaanController@store');
Route::get('perusahaan/edit/{id}', 'PerusahaanController@edit');
Route::post('perusahaan/update/{id}', 'PerusahaanController@update');
Route::delete('perusahaan/destroy/{id}', 'PerusahaanController@destroy')->name('perusahaan.destroy');

//Produk Perusahaan
Route::get('produk-perusahaan/index', 'ProdukPerusahaanController@index')->name('produk_perusahaan.index');
Route::post('produk-perusahaan/store', 'ProdukPerusahaanController@store');
Route::get('produk-perusahaan/edit/{id}', 'ProdukPerusahaanController@edit');
Route::post('produk-perusahaan/update/{id}', 'ProdukPerusahaanController@update');
Route::delete('produk-perusahaan/destroy/{id}', 'ProdukPerusahaanController@destroy')->name('produk_perusahaan.destroy');

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



Route::group(['middleware' => ['web']], function () {
	Route::get('/', 'PagesController@homepage');
	Route::get('about', 'PagesController@about');

	Auth::routes();
	Route::get('/home', 'PagesController@homepage');

	Route::get('register', function() {
		return redirect('/');
	});

	Route::resource('user', 'UserController');

	Route::resource('beli', 'BeliController');

	Route::resource('cart', 'CartController');

	Route::resource('butuh', 'ButuhController');

	Route::post('resep/hapus', 'ResepController@hapus');
	Route::resource('resep', 'ResepController');
	Route::get('resep/create/{resep}', 'ResepController@resep');

	Route::resource('bahan', 'BahanController');

	Route::resource('supplier', 'SupplierController');

	Route::resource('produk', 'ProdukController');

	Route::get('daftar_produk', 'ProdukController@daftar');

	Route::resource('pembelian', 'PembelianController');

	Route::resource('dapur', 'DapurController');

	Route::resource('penggunaan', 'PenggunaanController');

	Route::get('penjualan', 'PenjualanController@index');
	Route::get('penjualan/create', 'PenjualanController@create');
	Route::get('penjualan/add-to-cart/{penjualan}', 'PenjualanController@AddToCart');
	Route::get('penjualan/{penjualan}', 'PenjualanController@show');
	Route::post('penjualan', 'PenjualanController@store');
	Route::get('penjualan/{penjualan}/edit', 'PenjualanController@edit');
	Route::patch('penjualan/{penjualan}', 'PenjualanController@update');
	Route::delete('penjualan/{penjualan}', 'PenjualanController@destroy');

	Route::get('penjualan/{penjualan}/print', 'PenjualanController@print');

	Route::post('pemesanan/hapus', 'PemesananController@hapus');
	Route::resource('pemesanan', 'PemesananController');

	Route::post('pemesanan/ganti', 'PemesananController@ganti');
	Route::patch('pemesanan/ganti/{pemesanan}', 'PemesananController@baru');

	Route::get('laporan_penjualan', 'LaporanController@penjualan');
	Route::get('laporan_penjualan/print', 'LaporanController@printpenjualan');

	Route::get('laporan_pembelian', 'LaporanController@pembelian');
	Route::get('laporan_pembelian/print', 'LaporanController@printpembelian');

	Route::get('laporan_dapur', 'LaporanController@dapur');
	Route::get('laporan_dapur/print', 'LaporanController@printdapur');

	Route::get('laporan_stok', 'LaporanController@stok');
	Route::get('laporan_stok/print', 'LaporanController@printstok');


});


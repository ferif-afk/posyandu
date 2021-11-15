<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// Route untuk user
Route::group(['middleware' => ['auth']], function () {
	// user ibuhamil
	Route::get('/', 'App\Http\Controllers\IbuHamilController@index')->name('dashboard');
    Route::get('/ibuhamil', 'App\Http\Controllers\IbuHamilController@index');
	Route::get('/ibuhamil/create', "App\Http\Controllers\IbuHamilController@create");
	Route::post('/ibuhamil/create', "App\Http\Controllers\IbuHamilController@store")->name('store-bumil');
	Route::get('/ibuhamil/edit/{id}', "App\Http\Controllers\IbuHamilController@edit")->name('edit-bumil');
	Route::put('/ibuhamil/update/{id}', "App\Http\Controllers\IbuHamilController@update")->name('update-bumil');
	Route::get('/ibuhamil/export_excel', 'App\Http\Controllers\IbuHamilController@export_excel');

	// user bayi
	Route::get('/bayi',  'App\Http\Controllers\BayiController@index')->name('balita');
	Route::get('/bayi/create', "App\Http\Controllers\BayiController@create");
	Route::post('/bayi/create', "App\Http\Controllers\BayiController@store")->name('store-bayi');
	Route::get('/bayi/edit/{id}', "App\Http\Controllers\BayiController@edit")->name('edit-bayi');
	Route::put('/bayi/edit/{id}', "App\Http\Controllers\BayiController@update")->name('update-bayi');
	Route::get('/bayi/export_excel', 'App\Http\Controllers\BayiController@export_excel');

	// User penimbang
	Route::get('/penimbang',  'App\Http\Controllers\PenimbangController@index')->name('timbangan');
	Route::get('/penimbang/create', "App\Http\Controllers\PenimbangController@create");
	Route::post('/penimbang/create', "App\Http\Controllers\PenimbangController@store")->name('store-timbang');
	Route::get('/penimbang/edit/{id}', "App\Http\Controllers\PenimbangController@edit")->name('edit-timbang');
	Route::put('/penimbang/edit/{id}', "App\Http\Controllers\PenimbangController@update")->name('update-timbang');
	Route::get('/penimbang/export_excel', 'App\Http\Controllers\PenimbangController@export_excel');

	// User imunisasi
	Route::get('/imunisasi',  'App\Http\Controllers\ImunisasiController@index')->name('imunisasi');
	Route::get('/imunisasi/create', "App\Http\Controllers\ImunisasiController@create");
	Route::post('/imunisasi/create', "App\Http\Controllers\ImunisasiController@store")->name('store-imunisasi');
	Route::get('/imunisasi/edit/{id}', "App\Http\Controllers\ImunisasiController@edit")->name('edit-imunisasi');

	// User jenisimunisasi
	Route::get('/jenisimunisasi',  'App\Http\Controllers\JenisImunisasiController@index')->name('jenis_imunisasi');
	Route::get('/jenisimunisasi/create', "App\Http\Controllers\JenisImunisasiController@create");
	Route::post('/jenisimunisasi/create', "App\Http\Controllers\JenisImunisasiController@store")->name('store-jenisimunisasi');
	Route::get('/jenisimunisasi/edit/{id}', "App\Http\Controllers\JenisImunisasiController@edit")->name('edit-jenisimunisasi');
	Route::put('/jenisimunisasi/edit/{id}', "App\Http\Controllers\JenisImunisasiController@edit")->name('update-jenisimunisasi');
});

// Route untuk admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
	
	// admin ibu hamil route
	Route::get('ibuhamil/export_excel', 'App\Http\Controllers\Admin\IbuHamilController@export_excel')->name('ibuhamil.export_excel');
	Route::resource('ibuhamil', 'App\Http\Controllers\Admin\IbuHamilController');

	// admin bayi route
	Route::get('bayi/export_excel', 'App\Http\Controllers\Admin\BayiController@export_excel')->name('bayi.export_excel');
	Route::resource('bayi', 'App\Http\Controllers\Admin\BayiController');
	

	// admin timbangan route
	Route::get('penimbang/export_excel', 'App\Http\Controllers\Admin\PenimbangController@export_excel')->name('penimbang.export_excel');
	Route::resource('penimbang', 'App\Http\Controllers\Admin\PenimbangController');

	// admin imunisasi route
	Route::get('imunisasi/export_excel', 'App\Http\Controllers\Admin\ImunisasiController@export_excel')->name('imunisasi.export_excel');
	Route::resource('imunisasi', 'App\Http\Controllers\Admin\ImunisasiController');

	// admin jenis imunisasi route
	Route::get('jenisimunisasi/export_excel', 'App\Http\Controllers\Admin\JenisImunisasiController@export_excel')->name('jenisimunisasi.export_excel');
	Route::resource('jenisimunisasi', 'App\Http\Controllers\Admin\JenisImunisasiController');

	// admin kader route
	Route::get('kader/export_excel', 'App\Http\Controllers\Admin\KaderController@export_excel')->name('kader.export_excel');
	Route::resource('kader', 'App\Http\Controllers\Admin\KaderController');
});
	
	// admin ibuhamil
	// Route::post('/admin_ibuhamil', "IbuHamilController@store");
	// Route::get('/admin/{ibuhamil}', "IbuHamilController@show");
	// Route::patch('/admin/{ibuhamil}', "IbuHamilController@update");
	// Route::delete('/admin/{ibuhamil}', "IbuHamilController@destroy");
	// Route::get('/export_excel_ibuhamil', "IbuHamilController@export_excel");

	// admin bayi
	// Route::post('/admin_bayi', "BayiController@store");
	// Route::get('/admin/{bayi}', "BayiController@show");
	// Route::patch('/admin/{bayi}', "BayiController@update");
	// Route::delete('/admin/{bayi}', "BayiController@destroy");
	// Route::get('/export_excel_bayi', "BayiController@export_excel");

	// Admin penimbang
	// Route::post('/admin_penimbang', "PenimbangController@store");
	// Route::get('/admin/{penimbang}', "PenimbangController@show");
	// Route::patch('/admin/{penimbang}', "PenimbangController@update");
	// Route::delete('/admin/{penimbang}', "PenimbangController@destroy");
	// Route::get('/export_excel_penimbang', "PenimbangController@export_excel");

	// Admin imunisasi
	// Route::post('/admin_imunisasi', "ImunisasiController@store");
	// Route::get('/admin/{imunisasi}', "ImunisasiController@show");
	// Route::patch('/admin/{imunisasi}', "ImunisasiController@update");
	// Route::delete('/admin/{imunisasi}', "ImunisasiController@destroy");
	// Route::get('/export_excel_imunisasi', "ImunisasiController@export_excel");

	// Admin jenisimunisasi
	// Route::post('/admin_jenisimunisasi', "JenisImunisasiController@store");
	// Route::get('/admin/{jenisimunisasi}', "JenisImunisasiController@show");
	// Route::patch('/admin/{jenisimunisasi}', "JenisImunisasiController@update");
	// Route::delete('/admin/{jenisimunisasi}', "JenisImunisasiController@destroy");
	// Route::get('/export_excel_jenisimunisasi', "JenisImunisasiController@export_excel");

	// admin kader
	// Route::post('/admin_kader', "KaderController@store");
	// Route::get('/admin/{kader}', "KaderController@show");
	// Route::patch('/admin/{kader}', "KaderController@update");
	// Route::delete('/admin/{kader}', "KaderController@destroy");
	// Route::get('/export_excel_kader', "KaderController@export_excel");

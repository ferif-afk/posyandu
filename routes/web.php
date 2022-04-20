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
	Route::put('/imunisasi/edit/{id}', "App\Http\Controllers\ImunisasiController@update")->name('update-imunisasi');
	Route::get('/imunisasi/export_excel', 'App\Http\Controllers\ImunisasiController@export_excel');

	// User jenisimunisasi
	Route::get('/jenisimunisasi',  'App\Http\Controllers\JenisImunisasiController@index')->name('jenis_imunisasi');
	Route::get('/jenisimunisasi/create', "App\Http\Controllers\JenisImunisasiController@create");
	Route::post('/jenisimunisasi/create', "App\Http\Controllers\JenisImunisasiController@store")->name('store-jenisimunisasi');
	Route::get('/jenisimunisasi/edit/{id}', "App\Http\Controllers\JenisImunisasiController@edit")->name('edit-jenisimunisasi');
	Route::put('/jenisimunisasi/edit/{id}', "App\Http\Controllers\JenisImunisasiController@update")->name('update-jenisimunisasi');
	Route::get('/jenisimunisasi/export_excel', 'App\Http\Controllers\JenisImunisasiController@export_excel');
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

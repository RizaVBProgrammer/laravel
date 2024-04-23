<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('user/hapus/{id}', ['uses' => 'App\Http\Controllers\UserController@destroy'])->name('user.hapus');
	Route::resource('purchase-order', 'App\Http\Controllers\PurchaseOrderController');
	Route::resource('invoice', 'App\Http\Controllers\InvoiceController');
	Route::resource('pengeluaran-bbm', 'App\Http\Controllers\PengeluaranBbmController');
	Route::resource('biaya-operasional', 'App\Http\Controllers\BiayaOperasionalController');
	Route::get('biaya-operasional/pdf', 'BiayaOperasionalController@generatePDF')->name('biaya-operasional.pdf');
	Route::get('pengeluaran-bbm/hapus/{id}', ['uses' => 'App\Http\Controllers\PengeluaranBbmController@destroy'])->name('pengeluaran-bbm.hapus');
	Route::get('biaya-operasional/hapus/{id}', ['uses' => 'App\Http\Controllers\BiayaOperasionalController@destroy'])->name('biaya-operasional.hapus');
	Route::get('laporan/invoice', ['uses' => 'App\Http\Controllers\InvoiceController@laporan'])->name('invoice.laporan');
	Route::get('laporan/invoice/cetak', 'App\Http\Controllers\InvoiceController@cetak')->name('invoice.cetak');

	Route::get('invoice/hapus/{id}', ['uses' => 'App\Http\Controllers\InvoiceController@destroy'])->name('invoice.hapus');
	Route::resource('surat-jalan', 'App\Http\Controllers\SuratJalanController');
	Route::get('surat-jalan/hapus/{id}', ['uses' => 'App\Http\Controllers\SuratJalanController@destroy'])->name('surat-jalan.hapus');
	Route::get('laporan/surat-jalan', 'App\Http\Controllers\SuratJalanController@laporan')->name('surat-jalan.laporan');
	Route::get('invoice/pdf/{id}', ['uses' => 'App\Http\Controllers\InvoiceController@pdf'])->name('invoice.pdf');
	Route::get('biaya-operasional/filter', 'BiayaOperasionalController@filter')->name('biaya-operasional.filter');
	Route::get('invoice/filter', 'App\Http\Controllers\InvoiceController@filter')->name('invoice.filter');
	Route::get('laporan/purchase-order/cetak', 'App\Http\Controllers\PurchaseOrderController@cetak')->name('purchase-order.cetak');
	Route::get('laporan/biaya-operasional/cetak', 'App\Http\Controllers\PurchaseOrderController@cetak')->name('purchase-order.cetak');
	Route::get('laporan/purchase-order', ['uses' => 'App\Http\Controllers\PurchaseOrderController@laporan'])->name('purchase-order.laporan');
	Route::get('purchase-order/hapus/{id}', ['uses' => 'App\Http\Controllers\PurchaseOrderController@destroy'])->name('purchase-order.hapus');
	Route::get('purchase-order/status/{status}/{id}', ['as' => 'purchase-order.status', 'uses' => 'App\Http\Controllers\PurchaseOrderController@status']);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => ["Direktur"]], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\NiceController;


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


Route::get('/', 'App\Http\Controllers\ShopController@index')->name('shop.index');
Route::get('/search', 'App\Http\Controllers\ShopController@search')->name('shop.search');
Route::post('/detail', 'App\Http\Controllers\ShopController@detail')->name('shop.detail');
Route::post('/store', 'App\Http\Controllers\ReserveController@store')->name('reserve.store');
Route::get('/mypage', 'App\Http\Controllers\ReserveController@index')->name('reserve.index');
Route::post('/change', 'App\Http\Controllers\ReserveController@detail')->name('reserve.change');
Route::post('/update', 'App\Http\Controllers\ReserveController@update')->name('reserve.update');
Route::post('/delete', 'App\Http\Controllers\ReserveController@delete')->name('reserve.delete');
Route::post('/like', 'App\Http\Controllers\NiceController@like')->name('shop.like');
Route::post('/unlike', 'App\Http\Controllers\NiceController@unlike')->name('shop.unlike');


Route::get('/thanks', function () {
    return view('thanks');
})->middleware(['auth'])->name('thanks');

require __DIR__ . '/auth.php';

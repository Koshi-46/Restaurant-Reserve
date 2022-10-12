<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReserveController;


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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', 'App\Http\Controllers\ShopController@index')->name('shop.index');
Route::get('/search', 'App\Http\Controllers\ShopController@search')->name('shop.search');
Route::post('/detail', 'App\Http\Controllers\ShopController@detail')->name('shop.detail');
Route::post('/store', 'App\Http\Controllers\ReserveController@store')->name('reserve.store');


// Route::post('/nice', 'App\Http\Controllers\NiceController@store')->name('shop.store');
// Route::post('/delete', 'App\Http\Controllers\NiceController@destroy')->name('shop.destroy');



Route::get('/thanks', function () {
    return view('thanks');
})->middleware(['auth'])->name('thanks');

require __DIR__.'/auth.php';

// ログインしている人だけ見れる
// Route::get('/home', [AuthorController::class, 'index'])->middleware('auth');

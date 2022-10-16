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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', 'App\Http\Controllers\ShopController@index')->name('shop.index');
Route::get('/search', 'App\Http\Controllers\ShopController@search')->name('shop.search');
Route::post('/detail', 'App\Http\Controllers\ShopController@detail')->name('shop.detail');
Route::post('/store', 'App\Http\Controllers\ReserveController@store')->name('reserve.store');
Route::get('/reserve', 'App\Http\Controllers\ReserveController@index')->name('reserve.index');
Route::post('/change', 'App\Http\Controllers\ReserveController@detail')->name('reserve.change');
Route::post('/update', 'App\Http\Controllers\ReserveController@update')->name('reserve.update');
Route::post('/delete', 'App\Http\Controllers\ReserveController@delete')->name('reserve.delete');
Route::get('/nice', 'App\Http\Controllers\NiceController@index')->name('nice.index');




Route::post('/like','App\Http\Controllers\NiceController@like')->name('shop.like');
Route::post('/unlike','App\Http\Controllers\NiceController@unlike')->name('shop.unlike');

Route::prefix('cart')->middleware('auth:users')->group(function(){
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('add', [CartController::class, 'add'])->name('cart.add');   
    Route::post('delete/{item}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('success', [CartController::class, 'success'])->name('cart.success');
    Route::get('cancel', [CartController::class, 'cancel'])->name('cart.cancel');
});




Route::get('/thanks', function () {
    return view('thanks');
})->middleware(['auth'])->name('thanks');

require __DIR__.'/auth.php';

// ログインしている人だけ見れる
// Route::get('/home', [AuthorController::class, 'index'])->middleware('auth');

<?php

use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SizeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('viewdetail/{id}',[ProductController::class,'show'])->name('veiw.detail');

Route::group(['middleware' => 'admin'], function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('sizes',SizeController::class);
Route::resource('colors',ColorController::class);
Route::resource('products',ProductController::class);
Route::get('/status/update', [ProductController::class, 'updateStatus'])->name('update.status');

});

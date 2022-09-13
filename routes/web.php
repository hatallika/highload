<?php

use App\Http\Controllers\LoggerController;
use App\Http\Controllers\MemcachedController;
use App\Http\Controllers\MyCacheController;
use App\Http\Controllers\RedisController;
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

Route::get('/logger', [LoggerController::class, 'index']);
Route::get('/memcached', [MemcachedController::class, 'index'])->name('memcached');
Route::get('/redis', [RedisController::class, 'index'])->name('redis');
Route::get('/getcache', [MyCacheController::class, 'index'])->name('getcache');

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Core routes
Route::get('/', [App\Http\Controllers\CoreController::class, 'index']);
Route::get('/about_us', [App\Http\Controllers\CoreController::class, 'about'])->name('about');
Route::get('/my', [App\Http\Controllers\CoreController::class, 'test_dash'])->name('dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

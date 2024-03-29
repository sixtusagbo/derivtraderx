<?php

use App\Http\Controllers\ManagePaymentController;
use App\Http\Controllers\PaymentAddController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserWithdrawalController;
use App\Http\Controllers\WithdrawalAddController;
use App\Models\UserWithdrawals;
use App\Models\WithdrawalAdd;
use Illuminate\Support\Facades\Artisan;
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
Route::get('/faq', [App\Http\Controllers\CoreController::class, 'faq'])->name('faq');
Route::get('/contact', [App\Http\Controllers\CoreController::class, 'contact'])->name('contact');
Route::get('/policy', [App\Http\Controllers\CoreController::class, 'policy'])->name('policy');

// User dashboard routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/deposit', [App\Http\Controllers\HomeController::class, 'deposit'])->name('deposit');
Route::post('/deposit', [App\Http\Controllers\HomeController::class, 'confirm_deposit'])->name('confirm_deposit');
Route::post('/create_deposit', [App\Http\Controllers\HomeController::class, 'create_deposit'])->name('create_deposit');
Route::get('/my_deposits', [App\Http\Controllers\HomeController::class, 'my_deposits'])->name('my_deposits');
Route::get('/withdraw', [App\Http\Controllers\HomeController::class, 'withdraw'])->name('withdraw');
Route::post('/user_addresses', [App\Http\Controllers\HomeController::class, 'user_addresses'])->name('user_addresses');
Route::get('/referrals', [App\Http\Controllers\HomeController::class, 'referrals'])->name('referrals');
Route::get('/referral_banners', [App\Http\Controllers\HomeController::class, 'banners'])->name('banners');
Route::get('/exchange', [App\Http\Controllers\HomeController::class, 'exchange'])->name('exchange');
Route::get('/security', [App\Http\Controllers\HomeController::class, 'security'])->name('security');
Route::post('/security', [App\Http\Controllers\HomeController::class, 'sec_settings'])->name('update_sec');

Auth::routes(['verify' => true]);

// Admin dashboard routes
Route::resource('users', UserController::class)->except(['create', 'edit']);
Route::resource('withdrawal_addresses', WithdrawalAddController::class)->except(['create', 'show', 'edit', 'store']);
Route::resource('withdrawals', UserWithdrawalController::class)->except(['create', 'show', 'edit']);
Route::resource('payments', ManagePaymentController::class)->except(['create', 'show', 'edit']);
Route::resource('payment_addresses', PaymentAddController::class)->except(['create', 'show', 'edit']);
Route::resource('plans', PlanController::class)->except(['create', 'show', 'edit']);
Route::get('/admins', [App\Http\Controllers\UserController::class, 'admin_users'])->name('Admins_list');

Route::get('mimi_optimize_app', function () {
  Artisan::call('optimize:clear');

  return redirect('/');
});

Route::get('mimi_migrate_fresh', function () {
  Artisan::call('migrate:fresh', [
    '--force' => true
  ]);
  Artisan::call('db:seed', [
    '--force' => true
  ]);

  return redirect('/');
});

Route::get('mimi_migrate', function () {
  Artisan::call('migrate', [
    '--force' => true,
    '--seed' => true
  ]);

  return redirect('/');
});

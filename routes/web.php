<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserWithdrawalController;
use App\Http\Controllers\WithdrawalAddController;
use App\Models\UserWithdrawals;
use App\Models\WithdrawalAdd;
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

Route::resource('users', UserController::class)->except(['create', 'edit']);
Route::resource('withdrawal_addresses', WithdrawalAddController::class)->except(['create', 'show', 'edit', 'store']);
Route::resource('withdrawals', UserWithdrawalController::class)->except(['create', 'show', 'edit', 'store']);

Route::get('/admins', [App\Http\Controllers\UserController::class, 'admin_users'])->name('Admins_list');

Route::get('/payment_address', [App\Http\Controllers\PaymentAddController::class, 'index'])->name('payment_Address');
Route::put('/payment_address/update/{id}', [App\Http\Controllers\PaymentAddController::class, 'update'])->name('update_payment_Address');
Route::delete('/payment_address/delete/{id}', [App\Http\Controllers\PaymentAddController::class, 'destroy'])->name('delete_payment_Address');
Route::post('/payment_address/create', [App\Http\Controllers\PaymentAddController::class, 'create'])->name('create_payment_Address');

Route::get('/admin/payment', [App\Http\Controllers\ManagePaymentController::class, 'index'])->name('admin_list_Payment');
Route::post('/admin/payment/new', [App\Http\Controllers\ManagePaymentController::class, 'store'])->name('admin_Create_Payment');
Route::put('/admin/payment/update/{id}', [App\Http\Controllers\ManagePaymentController::class, 'update'])->name('admin_Update_Payment');
Route::delete('/admin/payment/delete/{id}', [App\Http\Controllers\ManagePaymentController::class, 'destroy'])->name('admin_delete_Payment');
Route::get('/admin/payment/history', [App\Http\Controllers\ManagePaymentController::class, 'history'])->name('admin_payment_history');

Route::get('/admin/investment_plans', [App\Http\Controllers\PlanController::class, 'index'])->name('plans_list');
Route::put('/plan/update/{id}', [App\Http\Controllers\PlanController::class, 'update'])->name('update_plan');
Route::delete('/plan/delete/{id}', [App\Http\Controllers\PlanController::class, 'destroy'])->name('delete_plan');
Route::post('/plan/create', [App\Http\Controllers\PlanController::class, 'store'])->name('create_plan');

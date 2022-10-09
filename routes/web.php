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
Route::get('/faq', [App\Http\Controllers\CoreController::class, 'faq'])->name('faq');
Route::get('/contact', [App\Http\Controllers\CoreController::class, 'contact'])->name('contact');
Route::get('/policy', [App\Http\Controllers\CoreController::class, 'policy'])->name('policy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/deposit', [App\Http\Controllers\HomeController::class, 'deposit'])->name('deposit');

Auth::routes();

Route::delete('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('Delete_user');
Route::put('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('EditUser');
Route::get('/user/view/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('ViewUser');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('Users');
Route::get('/admins', [App\Http\Controllers\UserController::class, 'admin_users'])->name('Admins_list');
Route::post('/user/create', [App\Http\Controllers\UserController::class, 'store'])->name('create_user');

Route::get('/payment_address', [App\Http\Controllers\PaymentAddController::class, 'index'])->name('payment_Address');
Route::put('/payment_address/update/{id}', [App\Http\Controllers\PaymentAddController::class, 'update'])->name('update_payment_Address');
Route::delete('/payment_address/delete/{id}', [App\Http\Controllers\PaymentAddController::class, 'destroy'])->name('delete_payment_Address');
Route::post('/payment_address/create', [App\Http\Controllers\PaymentAddController::class, 'create'])->name('create_payment_Address');

Route::get('/admin/payment', [App\Http\Controllers\ManagePaymentController::class, 'index'])->name('admin_list_Payment');
Route::post('/admin/payment/new', [App\Http\Controllers\ManagePaymentController::class, 'store'])->name('admin_Create_Payment');
Route::put('/admin/payment/update/{id}', [App\Http\Controllers\ManagePaymentController::class, 'update'])->name('admin_Update_Payment');
Route::delete('/admin/payment/delete/{id}', [App\Http\Controllers\ManagePaymentController::class, 'destroy'])->name('admin_delete_Payment');
Route::get('/admin/payment/history', [App\Http\Controllers\ManagePaymentController::class, 'history'])->name('admin_payment_history');

Route::get('/makepayment', [App\Http\Controllers\UserPaymentController::class, 'index'])->name('list_makePayment');
Route::post('/makepayment/new', [App\Http\Controllers\UserPaymentController::class, 'store'])->name('makePayment');
Route::get('/payment/history', [App\Http\Controllers\UserPaymentController::class, 'history'])->name('payment_history');

Route::get('/admin/investment_plans', [App\Http\Controllers\PlansController::class, 'index'])->name('plans_list');
Route::put('/plan/update/{id}', [App\Http\Controllers\PlansController::class, 'update'])->name('update_plan');
Route::delete('/plan/delete/{id}', [App\Http\Controllers\PlansController::class, 'destroy'])->name('delete_plan');
Route::post('/plan/create', [App\Http\Controllers\PlansController::class, 'store'])->name('create_plan');

Route::get('/withdrawalAddress', [App\Http\Controllers\WithdrawalAddController::class, 'index'])->name('withdrawalAdd');
Route::post('/withdrawalAddress/new', [App\Http\Controllers\WithdrawalAddController::class, 'store'])->name('create_withdrawalAdd');

Route::get('/withdrawal/history', [App\Http\Controllers\UserWithdrawalController::class, 'index'])->name('withdrawal_history');
Route::post('/withdrawal/make', [App\Http\Controllers\UserWithdrawalController::class, 'store'])->name('make_withdrawal');
Route::get('/admin/withdrawal/history', [App\Http\Controllers\UserWithdrawalController::class, 'index2'])->name('manage_withdrawal_history');
Route::put('/admin/withdrawal/update/{id}', [App\Http\Controllers\UserWithdrawalController::class, 'update'])->name('update_withdrawal_history');
Route::delete('/admin/withdrawal/delete/{id}', [App\Http\Controllers\UserWithdrawalController::class, 'destroy'])->name('delete_withdrawal_history');

Route::get('/admin/withdrawalAdd', [App\Http\Controllers\WithdrawalAddController::class, 'index'])->name('manage_withdrawal_Address');
Route::delete('/admin/withdrawalAdd/delete/{id}', [App\Http\Controllers\WithdrawalAddController::class, 'destroy'])->name('delete_withdrawal_Address');
Route::put('/admin/withdrawalAdd/update/{id}', [App\Http\Controllers\WithdrawalAddController::class, 'update'])->name('update_withdrawal_Address');

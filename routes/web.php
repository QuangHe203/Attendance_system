<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;

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
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

#ADMIN
Route::get('/admin_account_management', [UserController::class, 'showAccountDetail'])->name('admin.account_management');

#ACCOUNT MANAGEMENT
Route::get('/user/list', [UserController::class, 'showAccountDetail'])->name('user.list');
Route::get('/user/search', [UserController::class, 'search'])->name('user.search');
Route::get('/user/edit', function() {})->name('user.edit');
Route::get('/user/delete', function() {})->name('user.delete');

#SCHEDULE MANAGEMENT
Route::get('/admin_schedule_management', function() { return view('admin.admin_schedule_management');})->name('admin.schedule_management');

#ATTENDANCE RESULT
Route::get('/admin_attendance_management', function(){return view('admin.admin_attendance_results');})->name('admin.attendance_results');

#MAILBOX MANAGEMENT
Route::get('/admin_mailbox_management', function() {return view('admin.admin_mailbox_management'); })->name('admin.mailbox_management');

Route::get('/send-message', [MessageController::class, 'showForm'])->name('send.message.form');
Route::post('/send-message', [MessageController::class, 'sendMessage'])->name('send.message');

Route::get('/sent-messages', [MessageController::class, 'viewSentMessages'])->name('sent.messages');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentAttendanceResultController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherAttendanceResultController;
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
Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

#ADMIN
Route::get('/admin_account_management', [UserController::class, 'showAccountDetail'])->name('admin.account_management');

#ACCOUNT MANAGEMENT
Route::get('/user/list', [UserController::class, 'list'])->name('user.list');
Route::get('/user/search', [UserController::class, 'search'])->name('user.search');
Route::post('/user/{id}/upload-image', [UserController::class, 'uploadImage'])->name('user.uploadImage');
Route::get('/user/edit', function() {})->name('user.edit');
Route::get('/user/delete', function() {})->name('user.delete');

#SCHEDULE MANAGEMENT
Route::get('/admin_schedule_management', function() { return view('admin.admin_schedule_management');})->name('admin.schedule_management');

#ATTENDANCE RESULT
Route::get('/admin_attendance_management', [StudentAttendanceResultController::class, 'index'])->name('admin.attendance_results');
Route::get('/student_attendance_result/search', [StudentAttendanceResultController::class, 'search'])->name('admin.student_attendance_results.search');
Route::get('/teacher_attendance_result/search', [TeacherAttendanceResultController::class, 'search'])->name('admin.teacher_attendance_results.search');

#TEACHER
#ACCOUNT MANAGEMENT
Route::get('/teacher_account_management', [TeacherController::class, 'showAccountInf'])->name('teacher.account_management');
#SCHEDULE MANAGEMENT
Route::get('/teacher_schedule_management', function(){return view('teacher.teacher_schedule_management');})->name('teacher.schedule_management');
Route::get('/api/teacherschedule/{day}/{month}/{year}', [ScheduleController::class, 'getTeacherSchedule']);
#ATTENDANCE RESULT
Route::get('/teacher_attendance_result_management', function(){return view('teacher.teacher_attendance_results');})->name('teacher.attendance_results');
#MAILBOX MANAGEMENT
Route::get('/teacher_mailbox_management', function(){return view('teacher.teacher_mailbox_management');})->name('teacher.mailbox_management');

#Student
#ACCOUNT MANAGEMENT
Route::get('/student_account_management', [StudentController::class, 'showAccountInf'])->name('student.account_management');
#SCHEDULE MANAGEMENT
Route::get('/student_schedule_management', function(){return view('student.student_schedule_management');})->name('student.schedule_management');
Route::get('/api/calendar/{month}/{year}', [ScheduleController::class, 'getCalendar']);
Route::get('/api/studentschedule/{day}/{month}/{year}', [ScheduleController::class, 'getStudentSchedule']);
#ATTENDANCE RESULT
Route::get('/student_attendance_result_management', [StudentAttendanceResultController::class,'StudentAttendanceResultIndex'])->name('student.attendance_results');
#MAILBOX MANAGEMENT
Route::get('/student_mailbox_management', [MessageController::class, 'getInfo'])->name('student.mailbox_management');
Route::get('/mail_box/getStudent', [MessageController::class, 'getStudent']);
Route::get('/mail_box/getTeacher', [MessageController::class, 'getTeacher']);
Route::post('/send-message', [MessageController::class, 'sendMessage'])->name('send.message');
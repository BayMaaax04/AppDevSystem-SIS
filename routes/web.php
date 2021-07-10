<?php

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;

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

Route::middleware(['middleware'=> 'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::get('/', function () {
    Alert::alert('Title', 'Message', 'Type');
    return view('auth.login');
});

// Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'administrator', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function () {
    Route::get('dashboard', [AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings', [AdminController::class,'settings'])->name('admin.settings');
    Route::get('students', [AdminController::class,'students'])->name('admin.students');


    Route::get('students_list', [StudentController::class,'studentsList'])->name('get.student.list');
    Route::get('student_details', [StudentController::class,'studentDetails'])->name('get.student.detail');

    // Route::get('getStudentList', [AdminController::class,'getStudentList'])->name('admin.studentslist');
});





Route::group(['prefix'=>'student', 'middleware'=>['isUser','auth','PreventBackHistory']], function () {
    Route::get('/', [UserController::class,'index'])->name('user.dashboard');
    Route::get('profile', [UserController::class,'profile'])->name('user.profile');
    Route::get('settings', [UserController::class,'settings'])->name('user.settings');
    Route::get('registration', [UserController::class,'registration'])->name('user.registration');
    Route::get('grading', [UserController::class,'grading'])->name('user.grading');
    Route::get('schedule', [UserController::class,'schedule'])->name('user.schedule');
    Route::get('account_settings', [UserController::class,'accountSettings'])->name('user.accountSettings');

    Route::post('update_info', [UserController::class,'updateInfo'])->name('user.updateInfo');

    Route::post('update_picture', [UserController::class,'updatePicture'])->name('user.updatePicture');

    Route::post('change_password', [UserController::class,'changePassword'])->name('user.changePassword');


});

Route::get('reset-password/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@getPassword');
Route::post('reset-password', 'App\Http\Controllers\Auth\ResetPasswordController@updatePassword');


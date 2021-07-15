<?php

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubjectController;

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
    Route::post('delete_student', [StudentController::class,'deleteStudents'])->name('delete.student');

    
    Route::get('professors', [ProfessorController::class,'professors'])->name('admin.professors');
    Route::post('add_professor', [ProfessorController::class,'addProfessor'])->name('add.professor');
    Route::get('professors_list', [ProfessorController::class,'professorsList'])->name('get.professor.list');
    Route::post('professors_details', [ProfessorController::class,'professorDetails'])->name('get.professor.detail');
    Route::post('update_professors_details', [ProfessorController::class,'updateProfessorDetails'])->name('update.professor.detail');
    Route::post('delete_professors_details', [ProfessorController::class,'deleteProfessorDetails'])->name('delete.professor.detail');


    Route::get('courses', [CourseController::class,'courses'])->name('admin.courses');
    Route::post('add_course', [CourseController::class,'addCourse'])->name('add.course');
    Route::get('courses_list', [CourseController::class,'coursesList'])->name('get.course.list');
    Route::post('courses_details', [CourseController::class,'courseDetails'])->name('get.course.detail');
    Route::post('update_courses_details', [CourseController::class,'updateCourseDetails'])->name('update.course.detail');
    Route::post('delete_courses_details', [CourseController::class,'deleteCourseDetails'])->name('delete.course.detail');


    Route::get('subjects', [SubjectController::class,'subjects'])->name('admin.subjects');
    Route::post('add_subject', [SubjectController::class,'addSubject'])->name('add.subject');
    Route::post('subject_details', [SubjectController::class,'subjectDetails'])->name('get.subject.detail');
    Route::post('update_subjects_details', [SubjectController::class,'updateSubjectDetails'])->name('update.subject.detail');
    Route::post('delete_subjects_details', [SubjectController::class,'deleteSubjectDetails'])->name('delete.subject.detail');
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


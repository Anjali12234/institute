<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GeneralQuestionController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\ProgrammeController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SystemSettingController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\TeamController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->name('dashboard');
Route::resource('systemSetting', SystemSettingController::class);
Route::resource('course', CourseController::class);
Route::put('course/{course}/updateStatus', [CourseController::class, 'updateStatus'])->name('course.updateStatus');
Route::resource('student', StudentController::class)->except(  'show');
Route::get('student/{studentType}', [StudentController::class, 'student'])->name('student');
Route::put('student/{student}/updateStatus', [StudentController::class, 'updateStatus'])->name('student.updateStatus');
Route::put('student/{student}/updateStudentType', [StudentController::class, 'updateStudentType'])->name('student.updateStudentType');



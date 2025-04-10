<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\RequiredDocumentController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SystemSettingController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::resource('systemSetting', SystemSettingController::class);
Route::resource('requiredDocument', RequiredDocumentController::class);
Route::put('requiredDocument/{requiredDocument}/updateStatus', [RequiredDocumentController::class, 'updateStatus'])->name('requiredDocument.updateStatus');
Route::resource('course', CourseController::class);
Route::put('course/{course}/updateStatus', [CourseController::class, 'updateStatus'])->name('course.updateStatus');
Route::prefix('student')->as('student.')->controller(StudentController::class)->group(function () {
    Route::get('index/{studentType}', 'index')->name('index');
    Route::get('allStudent', 'allStudent')->name('allStudent');
    Route::get('create/{studentType}', 'create')->name('create');
    Route::get('edit/{student}', 'edit')->name('edit');
    Route::put('update/{student}', 'update')->name('update');
    Route::post('store/{studentType}', 'store')->name('store');
    Route::put('updateStatus/{student}',  'updateStatus')->name('updateStatus');
    Route::put('updateStudentType/{student}', 'updateStudentType')->name('updateStudentType');
    Route::delete('destroy/{student}', 'destroy')->name('destroy');

});




Route::prefix('user')->as('user.')->controller(AuthController::class)->group(function () {
    Route::get('profile', 'profile')->name('profilePage');
    Route::patch('profile', 'updateProfile')->name('profile.update');
    Route::put('password', 'updatePassword')->name('password.update');
    Route::post('logout', 'logout')->name('logout');
});

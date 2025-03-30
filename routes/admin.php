<?php

use App\Http\Controllers\Admin\RequiredDocumentController;
use App\Http\Controllers\Admin\SystemSettingController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::resource('systemSetting', SystemSettingController::class);
Route::resource('requiredDocument', RequiredDocumentController::class);
Route::put('requiredDocument/{requiredDocument}/updateStatus', [RequiredDocumentController::class, 'updateStatus'])->name('requiredDocument.updateStatus');



Route::prefix('user')->as('user.')->controller(AuthController::class)->group(function () {
    Route::get('profile', 'profile')->name('profilePage');
    Route::patch('profile', 'updateProfile')->name('profile.update');
    Route::put('password', 'updatePassword')->name('password.update');
    Route::post('logout', 'logout')->name('logout');
});

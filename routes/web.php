<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);

Route::middleware(['2fa','auth','verified'])->group(function () {

    Route::get('/dashboard', function () {return inertia('Modules/Dashboard/Index'); })->name('dashboard');
    Route::resource('/profile', App\Http\Controllers\User\ProfileController::class);

    Route::prefix('directory')->group(function(){
        Route::resource('/schools', App\Http\Controllers\Directories\SchoolController::class);
        Route::resource('/courses', App\Http\Controllers\Directories\CourseController::class);
        Route::resource('/certifications', App\Http\Controllers\Directories\CertificationController::class);
        Route::resource('/programs', App\Http\Controllers\Directories\ProgramController::class);
        Route::resource('/privileges', App\Http\Controllers\Directories\PrivilegeController::class);
    }); 

    Route::prefix('lists')->group(function(){
        Route::resource('/agencies', App\Http\Controllers\Lists\AgencyController::class);
        Route::resource('/locations', App\Http\Controllers\Lists\LocationController::class);
        Route::resource('/dropdowns', App\Http\Controllers\Lists\DropdownController::class);
    }); 

    Route::prefix('scholars')->group(function(){
        Route::resource('/lists', App\Http\Controllers\Scholars\ListsController::class);
        Route::resource('/qualifiers', App\Http\Controllers\Scholars\QualifierController::class);
        Route::resource('/endorsements', App\Http\Controllers\Scholars\EndorsementController::class);
    }); 
});

require __DIR__.'/auth.php';
require __DIR__.'/utility.php';

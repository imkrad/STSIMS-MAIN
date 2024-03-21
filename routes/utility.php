<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['2fa','auth'])->group(function () {
    Route::get('/utilities/{type}', [App\Http\Controllers\User\UtilityController::class, 'index']);
    Route::prefix('utility')->group(function(){

        Route::resource('/users', App\Http\Controllers\User\Utility\UserController::class);
        Route::resource('/backups', App\Http\Controllers\User\Utility\BackupController::class);

        Route::prefix('menus')->group(function(){
            Route::controller(App\Http\Controllers\User\Utility\MenuController::class)->group(function () {
                Route::get('/','index');
                Route::get('/lists','lists');
                Route::post('/','store');
            });
        });

        Route::prefix('roles')->group(function(){
            Route::controller(App\Http\Controllers\User\Utility\RoleController::class)->group(function () {
                Route::get('/','index');
                Route::post('/','store');
                Route::put('/','update');
            });
        });

        Route::prefix('logs')->group(function(){
            Route::controller(App\Http\Controllers\User\Utility\LogController::class)->group(function () {
                Route::get('/authentications','authentication');
                Route::get('/activities','activity');
            });
        });
    });
});
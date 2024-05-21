<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', [App\Http\Controllers\Api\IndexController::class, 'user']);
Route::prefix('01101011 01110010 01100001 01100100')->group(function(){
    Route::get('/locations/{type}', [App\Http\Controllers\Api\IndexController::class, 'locations']);
    Route::get('/lists/{type}', [App\Http\Controllers\Api\IndexController::class, 'lists']);
    Route::get('/schools/{type}', [App\Http\Controllers\Api\IndexController::class, 'schools']);

    Route::prefix('scholars')->group(function(){
        Route::get('/{code}', [App\Http\Controllers\Api\ScholarController::class, 'fetchScholars']);
        Route::post('/', [App\Http\Controllers\Api\ScholarController::class, 'storeScholars']);
    });

    Route::prefix('qualifiers')->group(function(){
        Route::get('/', [App\Http\Controllers\Api\QualifierController::class, 'fetchQualifiers']);
        Route::get('/statistics', [App\Http\Controllers\Api\QualifierController::class, 'getStatistics']);
        Route::post('/', [App\Http\Controllers\Scholars\QualifierController::class, 'store']);
    });

    Route::prefix('endorsements')->group(function(){
        Route::get('/', [App\Http\Controllers\Api\EndorsementController::class, 'fetchEndorsements']);
        Route::get('/statistics', [App\Http\Controllers\Api\EndorsementController::class, 'getStatistics']);
        Route::post('/', [App\Http\Controllers\Scholar\EndorsementController::class, 'store']);
    });
});

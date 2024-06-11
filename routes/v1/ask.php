<?php

use Illuminate\Http\Request;
use App\Http\Controllers\note\NoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ask\AskController;
use App\Http\Controllers\ask\AskActionController;


Route::prefix('ask')
    ->name('ask.')
    ->group( function () {
        Route::middleware('employee')->group( function () {
            Route::get('create', [AskController::class, 'create'])->name('create');
            Route::post('store', [AskActionController::class, 'store'])->name('store');
            Route::get('forceDelete/{id}', [AskActionController::class, 'forceDelete'])->name('forceDelete');
        });
        Route::middleware('admin')->group( function () {
            Route::get('confirm/{id}', [AskActionController::class, 'confirm'])->name('confirm');
        });
    });


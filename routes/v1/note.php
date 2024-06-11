<?php

use Illuminate\Http\Request;
use App\Http\Controllers\note\NoteController;
use App\Http\Controllers\note\NoteActionController;
use Illuminate\Support\Facades\Route;

Route::prefix('note')
    ->name('note.')
    ->group( function () {
        Route::middleware('admin')->group( function () {
            Route::post('store', [NoteActionController::class, 'store'])->name('store');
            Route::get('confirm/{id}', [NoteActionController::class, 'confirm'])->name('confirm');
            Route::get('forceDelete/{id}', [NoteActionController::class, 'forceDelete'])->name('forceDelete');
        });
        Route::middleware('methodist')->group( function () {
            Route::get('create', [NoteController::class, 'create'])->name('create');
        });
        Route::get('show/{select_by}/{select}', [NoteController::class, 'show'])->name('show');
        Route::get('select', [NoteController::class, 'select'])->name('select');
    });


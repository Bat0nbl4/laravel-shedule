<?php

use Illuminate\Http\Request;
use App\Http\Controllers\note\NoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\lesson\LessonController;
use App\Http\Controllers\lesson\LessonActionController;


Route::middleware('admin')
    ->prefix('lesson')
    ->name('lesson.')
    ->group( function () {
        Route::get('create', [LessonController::class, 'create'])->name('create');
        Route::post('store', [LessonActionController::class, 'store'])->name('store');
        Route::get('forceDelete/{id}', [LessonActionController::class, 'forceDelete'])->name('forceDelete');
    });

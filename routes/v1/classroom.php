<?php

use Illuminate\Http\Request;
use App\Http\Controllers\note\NoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\classroom\ClassroomController;
use App\Http\Controllers\classroom\ClassroomActionController;


Route::middleware('admin')
    ->prefix('classroom')
    ->name('classroom.')
    ->group( function () {
        Route::get('create', [ClassroomController::class, 'create'])->name('create');
        Route::post('store', [ClassroomActionController::class, 'store'])->name('store');
        Route::get('forceDelete/{id}', [ClassroomActionController::class, 'forceDelete'])->name('forceDelete');
    });


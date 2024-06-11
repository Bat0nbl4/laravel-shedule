<?php

use Illuminate\Http\Request;
use App\Http\Controllers\note\NoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\methodist\MethodistController;
use App\Http\Controllers\methodist\MethodistActionController;


Route::middleware('admin')
    ->prefix('methodist')
    ->name('methodist.')
    ->group( function () {
        Route::get('create', [MethodistController::class, 'create'])->name('create');
        Route::post('store', [MethodistActionController::class, 'store'])->name('store');
        Route::get('forceDelete/{id}', [MethodistActionController::class, 'forceDelete'])->name('forceDelete');
    });

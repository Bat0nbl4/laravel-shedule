<?php

use Illuminate\Http\Request;
use App\Http\Controllers\note\NoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employee\EmployeeController;
use App\Http\Controllers\employee\EmployeeActionController;


Route::middleware('admin')
    ->prefix('employee')
    ->name('employee.')
    ->group( function () {
        Route::get('create', [EmployeeController::class, 'create'])->name('create');
        Route::post('store', [EmployeeActionController::class, 'store'])->name('store');
        Route::get('forceDelete/{id}', [EmployeeActionController::class, 'forceDelete'])->name('forceDelete');
    });

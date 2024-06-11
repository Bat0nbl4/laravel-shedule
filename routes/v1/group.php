<?php

use Illuminate\Http\Request;
use App\Http\Controllers\note\NoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\group\GroupController;
use App\Http\Controllers\group\GroupActionController;


Route::middleware('admin')
    ->prefix('group')
    ->name('group.')
    ->group( function () {
        Route::get('create', [GroupController::class, 'create'])->name('create');
        Route::post('store', [GroupActionController::class, 'store'])->name('store');
        Route::get('forceDelete/{id}', [GroupActionController::class, 'forceDelete'])->name('forceDelete');
    });

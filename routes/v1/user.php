<?php

use Illuminate\Http\Request;
use App\Http\Controllers\note\NoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\UserActionController;
use App\Http\Controllers\user\UserController;


Route::prefix('user')
    ->name('user.')
    ->group( function () {
        Route::middleware('guest')->group( function () {
            Route::get('login', [UserController::class, 'login'])->name('login');
            Route::post('auth', [UserActionController::class, 'auth'])->name('auth');
            Route::get('create', [UserController::class, 'create'])->name('create');
            Route::post('store', [UserActionController::class, 'store'])->name('store');

            Route::get('forceDelete', [UserActionController::class, 'forceDelete'])->name('forceDelete');
        });

        Route::middleware('auth')->group( function () {
            Route::get('lk', [UserController::class, 'lk'])->name('lk');
            Route::get('logout', [UserActionController::class, 'logout'])->name('logout');
        });
    });

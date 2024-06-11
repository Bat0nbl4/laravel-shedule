<?php

use Illuminate\Http\Request;
use App\Http\Controllers\note\NoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\lesson\LessonController;
use App\Http\Controllers\lesson\LessonActionController;


Route::middleware('admin')
    ->prefix('methodist')
    ->name('methodist.')
    ->group( function () {

    });

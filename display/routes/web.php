<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;

Route::fallback(function () {
    return redirect('/');
    });

Route::get('display', [ScheduleController::class, 'display'])->name('display');
Route::get('/', [ScheduleController::class, 'display'])->name('display');
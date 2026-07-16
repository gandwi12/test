<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/apqc', [App\Http\Controllers\ApqcController::class, 'app'])->name('apqc.app');

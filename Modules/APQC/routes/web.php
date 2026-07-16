<?php

use Illuminate\Support\Facades\Route;
use Modules\APQC\Http\Controllers\APQCController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('apqcs', APQCController::class)->names('apqc');
});

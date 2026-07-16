<?php

use Illuminate\Support\Facades\Route;
use Modules\APQC\Http\Controllers\APQCController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('apqcs', APQCController::class)->names('apqc');
});

<?php

use App\Http\Controllers\TestController;
use App\Modules\TableEdit\TableEditController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::get('/test', [TestController::class, 'get']);
    Route::post('/test', [TestController::class, 'post']);

    Route::prefix('table-edit')->group(function () {
        Route::get('/{className}', [TableEditController::class, 'show']);
        Route::post('/table-edit', [TableEditController::class, 'edit']);
    });
});

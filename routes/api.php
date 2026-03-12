<?php

use App\Http\Controllers\TestController;
use App\Modules\TableEdit\Http\Controllers\TableEditController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::prefix('table-edit')->group(function () {
        Route::get('/{tableEditClass}', [TableEditController::class, 'show']);
        Route::post('/{tableEditClass}', [TableEditController::class, 'edit']);
    });

    Route::get('/test', [TestController::class, 'get']);
    Route::post('/test', [TestController::class, 'post']);
});

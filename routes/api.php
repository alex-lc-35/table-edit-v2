<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::get('/test', [TestController::class, 'get']);
    Route::post('/test', [TestController::class, 'post']);
});

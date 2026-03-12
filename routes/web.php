<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [TestController::class, 'index']);
Route::get('/test-page', [TestController::class, 'testPage']);
Route::get('/test-api', [TestController::class, 'testApi']);

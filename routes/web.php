<?php

use App\Http\Controllers\TestController;
use App\Modules\TableEdit\TableEditController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [TestController::class, 'index']);
Route::get('/test-page', [TestController::class, 'testPage']);

Route::get('/table-edit/{className}', [TableEditController::class, 'show']);

Route::post('/table-edit', [TableEditController::class, 'edit']);

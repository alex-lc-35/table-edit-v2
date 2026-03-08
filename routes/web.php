<?php

use App\Modules\TableEdit\TableEditController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/table-edit/{className}', [TableEditController::class, 'show']);

Route::post('/table-edit', [TableEditController::class, 'edit']);

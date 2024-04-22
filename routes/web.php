<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FormController::class, 'index']);
Route::post('submit', [FormController::class, 'createUser']);

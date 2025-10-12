<?php

use App\Http\Controllers\login\LoginController;
use App\Http\Controllers\project\ProjectController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'login']);
Route::post('/add-projects', [ProjectController::class, 'AddProject']);
Route::post('/remove-projects', [ProjectController::class, 'removeProject']);

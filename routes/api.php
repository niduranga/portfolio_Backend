<?php

use App\Http\Controllers\login\LoginController;
use App\Http\Controllers\project\ProjectController;
use App\Http\Controllers\register\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'login']);
Route::post('/add-projects', [ProjectController::class, 'AddProject']);
Route::post('/remove-projects', [ProjectController::class, 'removeProject']);
Route::Post('/register', [RegisterController::class, 'register']);

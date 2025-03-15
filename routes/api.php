<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\API\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(RegisterController::class)->group(function(){
    Route::get('register', 'showRegistrationForm');
    Route::post('register', 'register')->name('register');
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'login');
    Route::post('logout', 'logout');
});

        

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('tasks', TaskController::class);
    Route::post('tasks/store', [TaskController::class, 'store']);
    Route::get('tasks/edit/{id}', [TaskController::class, 'edit']);
    Route::post('tasks/update/{id}', [TaskController::class, 'update']);
    Route::delete('tasks/delete/{id}', [TaskController::class, 'destroy']);
});

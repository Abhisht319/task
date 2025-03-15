<?php

  

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

  

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\API\ProductController;

  

  

Route::controller(RegisterController::class)->group(function(){

    Route::get('register', 'showRegistrationForm');
    Route::post('register', 'register')->name('register');

    Route::get('/', 'showLoginForm')->name('login');
    Route::post('login', 'login');
    Route::get('taskdata', 'taskdata');
    Route::get('taskcreate', 'taskcreate');
    Route::get('taskedit/{id}', 'taskedit');

});

        

Route::middleware('auth:sanctum')->group( function () {
    // Route::apiResource('tasks', TaskController::class);
    Route::resource('tasks', TaskController::class);
});
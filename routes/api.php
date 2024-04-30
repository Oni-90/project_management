<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware('auth:sanctum')->get('/user', function(Request $request){
    return $request->user();
});

Route::prefix('users') -> group(function(){
    Route::get('/get_all_user', [UserController::class, 'GetAllUser']);
    Route::get('/find_user/{id}', [UserController::class, 'FindUser']);
    Route::post('/register_user', [UserController::class, 'RegisterUser']);
    Route::post('/login_user', [UserController::class, 'LoginUser']);
    Route::put('/update_user/{id}', [UserController::class, 'UpdateUser']);
    Route::delete('/delete_user/{id}', [UserController::class, 'DeleteUser']);
});

Route::prefix('projects') -> group(function(){
    Route::get('/get_all_project', [ProjectController::class, 'GetAllProject']);
    Route::post('/create_project', [ProjectController::class, 'CreateProject']);
    Route::put('/update_project/{id}', [ProjectController::class, 'UpdateProject']);
    Route::delete('delete_project/{id}', [ProjectController::class, 'DeleteProject']);
});

Route::prefix('employees') -> group(function(){
    Route::get('get_all_employee', [EmployeeController::class, 'GetAllEmployee']);
});

Route::prefix('trainees') -> group(function(){
    Route::get('get_all_trainee', [TraineeController::class, 'GetAllTrainee']);
});

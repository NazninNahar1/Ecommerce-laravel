<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepertmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/employees',EmployeeController::class);
// Route::post('/employees', [EmployeeController::class, 'store']);
// Route::get('/employees', [EmployeeController::class, 'index']);
// Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);
// Route::put('/employees/{id}', [EmployeeController::class, 'update']);
// Route::get('/search', [EmployeeController::class, 'search']);
// Route::get('/show', [EmployeeController::class, 'show']);

Route::apiResource('/departments',DepertmentController::class);




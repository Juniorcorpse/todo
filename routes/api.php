<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;

Route::get('ping/', function(){
    return [
        'pong' => true
    ];
});

Route::get('/unauthenticated', function(){
    return ['error' => 'Usuário não autenticado!'];
})->name('login');

Route::post('/user', [AuthController::class, 'create']);
//auth sanctum
Route::post('/auth/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('/todo', [ApiController::class, 'create']);
Route::middleware('auth:api')->post('/auth/me', [AuthController::class, 'me']);
Route::middleware('auth:api')->post('/auth/logout', [AuthController::class, 'logout']);

//auth sanctum
Route::post('/auth', [AuthController::class, 'login']);

//Route::middleware('auth:sanctum')->post('/todo', [ApiController::class, 'create']);
Route::middleware('auth:sanctum')->get('/auth/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->put('/todo/{id}', [ApiController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/todo/{id}', [ApiController::class, 'delete']);

Route::get('/todos', [ApiController::class, 'all']);
Route::get('/todo/{id}', [ApiController::class, 'read']);


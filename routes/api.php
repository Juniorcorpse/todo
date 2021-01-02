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

Route::post('/auth', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->post('/todo', [ApiController::class, 'create']);
Route::middleware('auth:sanctum')->get('/auth/logout', [AuthController::class, 'logout']);

Route::get('/todos', [ApiController::class, 'all']);
Route::get('/todo/{id}', [ApiController::class, 'read']);
Route::middleware('auth:sanctum')->put('/todo/{id}', [ApiController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/todo/{id}', [ApiController::class, 'delete']);

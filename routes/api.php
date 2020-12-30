<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('ping/', function(){
    return [
        'pong' => true
    ];
});

Route::post('/todo', [ApiController::class, 'create']);
Route::get('/todos', [ApiController::class, 'all']);
Route::get('/todo/{id}', [ApiController::class, 'read']);
Route::put('/todo/{id}', [ApiController::class, 'update']);
Route::delete('/todo/{id}', [ApiController::class, 'delete']);

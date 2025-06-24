<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', [TaskController::class, 'inicio']);
Route::get('/tasks', [TaskController::class, 'index']);

Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks/{id}', [TaskController::class, 'show']); // Ver
Route::put('/tasks/{id}/complete', [TaskController::class, 'complete']); // Marcar como completada
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']); // Eliminar

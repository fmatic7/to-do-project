<?php

use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});
// Route::get('/tasks', [TaskController::class, 'index']);
// Route::get('/tasks/{task}', [TaskController::class, 'show']);
// Route::post('/tasks', [TaskController::class, 'store']);
// Route::put('/tasks/{task}', [TaskController::class, 'update']);
// Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
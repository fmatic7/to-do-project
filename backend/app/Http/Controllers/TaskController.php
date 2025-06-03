<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::get();
        return response()->json($tasks);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'details' => ['required', 'string'],
            'is_completed' => ['nullable', 'boolean']
        ]);

        $data['is_completed'] = $data['is_completed'] ?? false;
        $data['completed_at'] = $data['is_completed'] ? now() : null;

        $task = Task::create($data);

        return response()->json([
            'message' => 'Task created successfully',
            'task' => $task
        ], 201);
    }

    public function show(Task $task) {
        return response()->json($task);
    }

    public function update(Request $request, Task $task) {
        $data = $request->validate([
            'title' => ['sometimes', 'string', 'max:50'],
            'details' => ['sometimes', 'string'],
            'is_completed' => ['sometimes', 'boolean']
        ]);

        if (array_key_exists('is_completed', $data)) {
            $data['completed_at'] = $data['is_completed'] ? now() : null;
        }

        $task->update($data);

        return response()->json([
            'message' => 'Task updated successfully',
            'task' => $task
        ]);
    }

    public function destroy(Task $task) {
        $task->delete();
        
        return response()->json([
            'message' => 'Task deleted successfully'
        ]); 
    }
}

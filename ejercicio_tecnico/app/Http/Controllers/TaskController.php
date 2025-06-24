<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{

    public function inicio()
    {
        $tasks = Task::all();
        return view('inicio', compact('tasks'));
    }

    public function index()
    {
        return response()->json(Task::all());
    }

    public function store(Request $request)
    {
        Log::info('Solicitud recibida en /api/tasks', $request->all());

        try {
            $validated = $request->validate([
                'title' => 'required|min:3',
                'description' => 'required',
            ]);

            $task = Task::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'status' => 'pendiente',
            ]);

            Log::info('Tarea creada correctamente', ['id' => $task->id]);

            return response()->json($task, 201);

        } catch (\Throwable $e) {
            Log::error('Error al guardar tarea', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Error al guardar tarea'], 500);
        }
    }

    public function show($id)
    {
        return response()->json(Task::findOrFail($id));
    }

    public function complete($id)
    {
        $task = Task::findOrFail($id);
        $task->status = 'completada';
        $task->save();
        return response()->json(['message' => 'Tarea marcada como completada']);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(['message' => 'Tarea eliminada']);
    }


}

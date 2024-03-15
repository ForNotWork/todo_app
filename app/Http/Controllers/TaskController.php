<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $taskData = $request->all();
        $taskData['createby'] = Auth::id();
        Task::create($taskData);

        return redirect()->route('dashboard')->with('success', 'Task created successfully');
    }

    public function edit(Task $task)
    {
        if (!$task) {
            abort(404);
        }
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
        // return redirect()->route('dashboard')->with('success', 'Task updated successfully');
    }

    public function complete(Request $request, Task $task)
    {
        $request->validate([
            'complete' => 'required|boolean',
        ]);

        $task->update(['complete' => $request->input('complete')]);

        return redirect()->route('tasks.index')->with('success', 'Task completed successfully');
    }

    public function destroy(Request $request, Task $task)
    {
        $task->delete($request);

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
        // return redirect()->route('dashboard')->with('success', 'Task deleted successfully');
    }
}

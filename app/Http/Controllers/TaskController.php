<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;

class TaskController extends Controller
{
    // List Tasks with Filters
    public function index(Request $request)
    {
        $query = Task::query();

        // Apply filters
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        if ($request->has('overdue')) {
            $query->whereDate('due_date', '<', now())
                  ->whereIn('status', ['Pending', 'In Progress']);
        }

        $tasks = $query->orderBy('due_date')->get();

        return view('tasks.index', compact('tasks'));
    }

    // Show Create Form
    public function create()
    {
        return view('tasks.create');
    }

    // Store New Task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'status' => 'required|in:Pending,In Progress,Completed',
            'priority' => 'required|in:Low,Medium,High',
            'due_date' => 'required|date',
            'assigned_to' => 'nullable|string|max:255',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    // Show Edit Form
    public function edit(Task $task)
    {
        if ($task->status === 'Completed') {
            return redirect()->route('tasks.index')->with('error', 'Task is completed and cannot be edited.');
        }

        return view('tasks.edit', compact('task'));
    }

    // Update Task
    public function update(Request $request, Task $task)
    {
        if ($task->status === 'Completed') {
            return redirect()->route('tasks.index')->with('error', 'Task is completed and cannot be edited.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'status' => 'required|in:Pending,In Progress,Completed',
            'priority' => 'required|in:Low,Medium,High',
            'due_date' => 'required|date',
            'assigned_to' => 'nullable|string|max:255',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    // Delete Task
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}


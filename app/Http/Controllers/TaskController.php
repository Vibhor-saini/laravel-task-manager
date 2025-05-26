<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = \App\Models\Task::with('category')->latest()->get();
        $categories = \App\Models\Category::all();
        return view('tasks.index', compact('tasks', 'categories'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        Task::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
        ]);

        return redirect('/tasks');
    }

    public function update(Task $task)
    {
        $task->update(['completed' => !$task->completed]);
        return redirect('/');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/');
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('tasks.create', compact('categories'));
    }
}

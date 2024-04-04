<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    public function index()
    {
        // Fetch all tasks from the database for a user
        $tasks = Task::all();
        // $tasks = Task::where('user_id', auth()->id())->get();
        return view('tasks', ['tasks' => $tasks,]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function save()
    {
        // Store data to the database
        $task = Task::create([
            'title' => request('title'),
            'description' => request('description'),
            'user_id' => auth()->id()
        ]);
        return redirect()->route('tasks');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    public function index()
    {
        // Fetch all tasks from the database for a user
        $tasks = Task::where('user_id', auth()->id())->orderBy('updated_at', 'desc')->get();
        return view('tasks', compact('tasks'));
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

    public function complete($id)
    {
        // Update the task as completed
        $task = Task::where('id', $id)->first();
        $task->completed = true;
        $task->completed_at = now();
        $task->save();
        return redirect()->route('tasks');
    }

    public function reopen($id)
    {
        // Update the task as not completed
        $task = Task::where('id', $id)->first();
        $task->completed = false;
        $task->completed_at = null;
        $task->save();
        return redirect()->route('tasks');
    }

    public function delete($id)
    {
        // Delete the task from the database
        $task = Task::where('id', $id)->first();
        $task->delete();
        return redirect()->route('tasks');
    }
}

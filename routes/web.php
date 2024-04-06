<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Controllers\IssueController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    Define the routes for the Tasks and the TasksController
    */
    Route::get('tasks', [TasksController::class, 'index'])->name('tasks');
    Route::post('tasks', [TasksController::class, 'save'])->name('tasks.save');
    Route::get('tasks/create', function () {
        return view('tasks.create');
    })->name('tasks.create');
    Route::patch('tasks/{id}', [TasksController::class, 'complete'])->name('tasks.complete');
    Route::patch('tasks/{id}/reopen', [TasksController::class, 'reopen'])->name('tasks.reopen');
    Route::delete('tasks/{id}', [TasksController::class, 'delete'])->name('tasks.delete');
    Route::get('tasks/{id}', function ($id) {
        $task = Task::where('id', $id)->first();
        return view('tasks.view', compact('task'));
    })->name('tasks.view');
    Route::put('tasks/{id}/edit', function ($id) {
        $task = Task::where('id', $id)->first();
        return view('tasks.edit', compact('task'));
    })->name('tasks.edit');


    /*
    Define the routes for the Issues and the IssuesController
    */
    Route::get('report', [IssueController::class, 'issues'])->name('report');
    
});

require __DIR__.'/auth.php';

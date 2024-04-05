<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

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

    Route::get('report', function () {
        return view('report');
    })->name('report');

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
    Route::patch('tasks/{id}/edit', function ($id) {
        $task = Task::where('id', $id)->first();
        return view('tasks.edit', compact('task'));
    })->name('tasks.edit');
});

require __DIR__.'/auth.php';

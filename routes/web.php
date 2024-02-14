<?php

use App\Http\Controllers\ProfileController;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/todolist', function () {
    $tasks = Task::all();
    return view('todolist.todolist', compact('tasks'));
})->middleware('auth');

Route::get('/todolist/add', function () {
    return view('todolist.add');
})->middleware('auth');

Route::post('/todolist/add', function () {
    $newTask = new Task();
    $newTask->user_id = Auth::id();
    if (is_null(request('task'))) {
        abort('404');
    };
    $newTask->task = request('task');
    $newTask->status = 0;
    $newTask->save();
    return redirect('/todolist');
})->middleware('auth');

Route::get('todolist/{id}/edit', function ($id) {
    $task = Task::findOrFail($id);
    return view('todolist.edit', compact('task'));
})->middleware('auth');

Route::put('todolist/{id}/edit', function ($id) {
    $task = Task::findOrFail($id);
    $task->task = request('task');
    $task->save();
    return redirect('/todolist');
})->middleware('auth');

Route::put('/todolist/{id}/update-status', function ($id) {
    $task = Task::findOrFail($id);
    $task->status = ($task->status === 0) ? 1 : 0;
    $task->save();
    return redirect('/todolist');
})->middleware('auth');

Route::delete('/todolist/{id}/delete', function ($id) {
    $task = Task::findOrFail($id);
    $task->delete();
    return redirect('/todolist');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

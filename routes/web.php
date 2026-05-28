<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

use App\Models\Project;

Route::get('/dashboard', function () {

    $projects = Project::with('tasks')->get();

    return view('dashboard', compact('projects'));

})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('projects', ProjectController::class);



Route::get('/projects/create', [ProjectController::class, 'create'])
    ->name('projects.create');

    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])
    ->name('projects.edit');

Route::put('/projects/{project}', [ProjectController::class, 'update'])
    ->name('projects.update');

Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])
    ->name('projects.destroy');


Route::get('/projects/{project}/tasks/create', [TaskController::class, 'create'])
    ->name('tasks.create');

Route::post('/projects/{project}/tasks', [TaskController::class, 'store'])
    ->name('tasks.store');

Route::get('/projects/{project}', [ProjectController::class, 'show'])
    ->name('projects.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

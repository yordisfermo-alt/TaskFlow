<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

class TaskController extends Controller
{
    /**
     * Guardar tarea
     */
    public function store(Request $request, Project $project)
    {
        Task::create([
            'title' => $request->title,
            'project_id' => $project->id,
        ]);

        return redirect()->route('projects.show', $project);
    }
}
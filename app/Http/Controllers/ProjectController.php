<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('user_id', Auth::id())->latest()->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        Project::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('projects.index')->with('success', 'Проект создан!');
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project); // если используешь политику
        return view('projects.edit', compact('project'));
    }


    public function show($id)
   {
    $project = \App\Models\Project::with('tasks')->findOrFail($id);

    return view('projects.show', compact('project'));
   }


    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        $project->update($request->only('title', 'description', 'deadline'));

        return redirect()->route('projects.index')->with('success', 'Проект обновлён!');

    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Проект удалён!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\{StoreProjectRequest, UpdateProjectRequest};

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = auth()->user()->projects()->latest('id')->get();

        return view('projects.index', compact('projects'));
    }

    /**
     * Display a listing of tasks of the resource.
     */
    public function tasks(Project $project)
    {
        $tasks = $project->tasks()->latest()->get();

        return view('projects.tasks', compact('project', 'tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();

        Project::query()->create($validated);

        toast('پروژه جدید ایجاد شد.', 'success');

        return to_route('projects.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        toast('پروژه ویرایش شد.', 'success');

        return to_route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        toast('پروژه حذف شد.', 'info');

        return to_route('projects.index');
    }
}

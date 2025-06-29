<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Models\{Task, Project};
use App\Http\Requests\{StoreTaskRequest, UpdateTaskRequest};

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks()->with('project')->latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $projects = auth()->user()->projects()->latest()->get();
        $statuses = TaskStatus::cases();

        return view('tasks.create', compact('projects', 'statuses'));
    }

    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        $project = Project::query()->find($validated['project_id']);

        $project->tasks()->create($validated);

        toast('تسک جدید ایجاد شد.', 'success');

        return to_route('tasks.index');
    }

    public function edit(Task $task)
    {
        $statuses = TaskStatus::cases();

        return view('tasks.edit', compact('task', 'statuses'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        toast('تسک آپدیت شد.', 'success');

        return to_route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        toast('تسک حذف شد.', 'info');

        return back();
    }
}

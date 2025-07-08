<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.index', [
            'tasks' => Task::all()
        ]);
    }

    public function store(TaskStoreRequest $request)
    {
        Task::create([
            'name' => $request->get('name'),
        ]);

        return back()->with('success', 'Task created successfully');
    }

    public function complete(Task $task)
    {
    }


    public function destroy(Task $task)
    {
    }
}

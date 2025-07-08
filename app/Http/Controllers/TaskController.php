<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        return view('tasks.index', [
            'tasks' => TaskResource::collection(Task::all())
        ]);
    }

    public function store(TaskStoreRequest $request): RedirectResponse
    {
        Task::create([
            'name' => $request->get('name'),
        ]);

        return back()->with('success', 'Task created successfully');
    }

    public function complete(Task $task): RedirectResponse
    {
        $task->markTaskAsComplete();

        return back()->with('success', 'Task completed successfully');
    }


    public function destroy(Task $task): RedirectResponse
    {
        try {
            $task->delete();
        } catch (\Exception $exception) {
            return back()->withErrors(['error' => 'Something went wrong while deleting the task']);
        }

        return back()->with('success', 'Task deleted successfully');
    }
}

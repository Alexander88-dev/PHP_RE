<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequst;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\RedirectResponsel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim(
            (string) $request->query('search', '')
        );
        $status = trim(
            (string) $request->query('status', '')
        );

        $tasks = Task::query()
            ->search($search)
            ->status($status)
            ->latest()
            ->paginate(5)
            ->withQueryString();
        return view(
            'tasks.index',
            [
                'tasks' => $tasks,
                'search' => $search,
                'selectedStatus' => $status,
                'statuses' => Task::statuses(),
            ]
        );
    }


    public function create(): View
    {
        return view('tasks.create', [
            'task' => new Task(),
            'statuses' => Task::statuses(),
        ]);
    }


    public function store(StoreTaskRequest $request): RedirectResponse
    {
        $task = Task::create(
            $request->validate()
        );

        return redirect()
            ->route('tasks.show', $task)
            ->with(
                'success',
                'Задача успешно создана',
            );
    }


    public function show(Task $task): View
    {
        return view('tasks.show', [
            'task' => $task,
        ]);
    }


    public function edit(Task $task): View
    {
        return view('task.edit', [
            'task' => $task,
            'statuses' => Task::statuses(),
        ]);
    }


    public function update(RedirectResponse $request, Task $task): RedirectResponse
    {
        $task->update(
            $request->validated()
        );

        return redirect()
            ->route('tasks.show', $task)
            ->with(
                'success',
                'Задача успешно обнавлена'
            );
    }


    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()
            ->route('tasls.index')
            ->with(
                'success',
                'Задача успешно удалена'
            );
    }
    
}

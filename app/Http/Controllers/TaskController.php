<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Caster\RedisCaster;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search= trim(
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
        return view('tasks.index',[
            'tasks' => $tasks,
            'search' => $search,
            'selectedStatus' => $status,
            'statuses' => Task::statuses(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tasks.create', [
            'task' => new Task(),
            'statuses' => Task::statuses(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
    $validated = $request->validate([
    ]);

    $task = Task::create($validated);

    return redirect()
        ->route('tasks.show', $task)
        ->with('success', 'Задача успешно создана');
    }


    /**
     * Display the specified resource.
     */
    public function show(Task $task): View
    {
        return view('tasks.show', [
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        return view('tasks.edit', [
            'task' => $task,
            'statuses' => Task::statuses(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task): RedirectResponse
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task):RedirectResponse
    {
        $task->delete();
        
        return redirect()
            ->route('tasks.index')
            ->with(
                'success',
                'Задача успешно удалена.'
            );
    }
}

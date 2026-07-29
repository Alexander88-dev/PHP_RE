@extends('layouts.app')

@section('title', 'Задачи')

@section('content')

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>

        <h1 class="mb-1">
            Задачи
        </h1>

        <p class="text-secondary mb-0">
            Всего найдено: {{ $tasks->total() }}
        </p>

        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            Добавить задачу
        </a>

    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">
        <form action="{{ route('tasks.index') }}" method="get" class="row g-3">
            <div class="col-md-6">
                <label for="search" class="form-label">Поиск</label>
                <input
                    type="search"
                    name="search"
                    id="search"
                    value="{{ $search }}"
                    class="form-control"
                    placeholder="Название или описание"
                >
            </div>

            <div class="col-md-4">
                <label for="status" class="form-label">Статус</label>
                <select name="status" id="status" class="form-select">
                    <option value="">
                        Все статусы
                    </option>

                    @foreach ($statuses as $value => $label)

                        <option
                            value="{{ $value }}"
                            @selected(
                                $selectedStatus === $value
                            )
                        >
                            {{ $label }}
                        </option>

                    @endforeach
                </select>
            </div>

            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-outline-primary w-100">
                    Найти
                </button>
            </div>

            @if ($search !== '' || $selectedStatus !== '')
                <div class="col-12">
                    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
                        Сбросить фильтры
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>

@if ($tasks->isEmpty())
    <div class="alert alert-info">
        Задачи по указанным условиям не найдены.
    </div>
@else
    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Статус</th>
                        <th>Дедлайн</th>
                        <th>Создан</th>
                        <th class="text-end">
                            Действия
                        </th>
                    </tr>
                </thead>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>
                            <a 
                                href="{{ route('tasks.show', $task) }}"
                                class="fw-semibold text-decoration-none">
                                {{ $task->title }}
                            </a>
                        </td>
                        <td>
                            <span class="badge text-bg-{{ $task->status_bootstrap_class }}">
                                {{ $task->status_label }}
                            </span>
                        </td>
                        <td>
                            @if ($task->deadline)
                                {{ $task->deadline->format('d.m.Y') }}
                            @else
                                <span class="text-secondary">
                                    Не указан
                                </span>
                            @endif
                        </td>
                        <td>
                            {{ $task->created_at->format('d.m.Y H:i') }}
                        </td>
                        <td class="text-end">
                            <a
                                href="{{ route('tasks.show', $task) }}"
                                class="btn btn-sm btn-outline-primary">
                                Открыть
                            </a>
                            <a
                                href="{{ route('tasks.edit', $task) }}"
                                class="btn btn-sm btn-outline-warning">
                                Изменить
                            </a>
                            <form
                                action="{{ route('tasks.destroy', $task) }}"
                                class="d-inline"
                                method="post"
                                onsubmit="return confirm('Удалить задачу?')">
                                @csrf 
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    Удалить
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="mt-4">
        {{ $tasks->links() }}
    </div>
@endif

@endsection
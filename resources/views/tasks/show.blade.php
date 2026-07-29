@extends('layouts.app')

@section('title', $task->title)

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex
            justify-content-between align-items-center
            gap-3">
                <h1 class="h4 mb-0">
                    {{ $task->title }}
                </h1>

                <span class="badge text-bg-{{
                $task->status_bootstrap_class }}">
                    {{ $task->status_label }}
                </span>
            </div>

            <div class="card-body">
                <h2 class="h6 text-secondary">
                    Описание
                </h2>
                @if ($task->description)
                    <p class="mb-4">
                        {!! nl2br(e($task->descriptions)) !!}
                    </p>
                @else
                    <p class="text-secondary mb-4">
                        Описание отсутвует
                    </p>
                @endif
            </div>

            <dl class="row mb-0">
                <dt class="col-sm-4">
                    Индентификатор
                </dt>
                <dd class="col-sm-8">
                    {{ $task->id }}
                </dd>
                <dt class="col-sm-4">
                    Дедлайн
                </dt>
                <dd class="col-sm-8">
                    {{ $task->deadline
                        ?  $task->deadline->format('d.m.Y')
                        : 'Не указан' }}
                </dd>
                <dt class="col-sm-4">
                    Дата создания
                </dt>
                <dd class="col-sm-8">
                    {{ $task->created_at->format('d.m.Y') }}
                </dd>
                <dt class="col-sm-4">
                    Дата изменения
                </dt>
                <dd class="col-sm-8">
                    {{ $task->updated_at->format('d.m.Y') }}
                </dd>
            </dl>
        </div>

        <div class="card-footer d-flex flex-warp gap-2">
            <a
                href="{{ route('tasks.edit', $task) }}"
                class="btn btn-warning">
                Редактировать
            </a>
            <a
                href="{{ route('tasks.index') }}"
                class="btn btn-outline-secondary">
                К списку
            </a>
            <form 
                action="{{ route('tasks.destroy', $task) }}"
                class="ms-auto" 
                method="post"
                onsubmit="return confirm('Удалить задачу?')">
                @csrf 
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    Удалить
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
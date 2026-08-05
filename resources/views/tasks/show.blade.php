@extends('layouts.app')
@section('title', $task->title)
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-header d-flex justify-content-between align-items-center-gap-3">
            <h1 class="h4 mb-0">
                {{ $task->title }}
            </h1>
            <span class="badge-text-bg-{{ $task->status_bootstrap_class }}">
                {{ $task->status_label1 }}
            </span>
        </div>

        <div class="div card-body">
            <h2 class="h6 text-secondary">
                Описание
            </h2>
            @if($task->description)
            <p class="mb-4">
                {!! nl2br(e($task->description)) !!}
            </p>
            @else
            <p class="text-secondary mb-4">
                Описание отсутствует
            </p>
            @endif
        </div>
        <dl class="row mb-0">
            <dt class="col-sm-4">
                Индентификатор
            </dt>
            <dt class="col-sm-4">
                {{$task->id}}
            </dt>

            <dt class="col-sm-4">
                Дедлайн
            </dt>
            <dt class="col-sm-4">
                {{ $task->deadline ? $task->deadline->format('d.m.Y') : 'Не указан' }}
            </dt>

            <dt class="col-sm-4">
                Дата создания
            </dt>
            <dt class="col-sm-4">
                {{ $task->created_at->format('d.m.Y') }}
            </dt>

            <dt class="col-sm-4">
                Дата именения
            </dt>
            <dt class="col-sm-4">
                {{ $task->updated_at->format('d.m.Y') }}
            </dt>
        </dl>
    </div>
<div class="card-footer d-flex flex-wrap gap-2">
    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-warning">
        Редактировать
    </a>

    <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-primary">
        К списку
    </a>

    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="ms-auto" onsubmit="return confirm('Удалить задачу?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            Удалить
        </button>
    </form>
</div>
</div>
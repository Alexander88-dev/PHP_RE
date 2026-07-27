@extends('layouts.app')

@session('title', 'Новая задача')

@section('content')

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h1 class="mb-1">Задачи</h1>

        <p class="text-secondary mb-0">
            Всего найдено: {{ $tasks->total() }}
        </p>

        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            Добавить задачи
        </a>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('tasks.index') }}" method="get" class="row g-3">
                <div class="col-md-6">
                    <!-- !!! -->
                </div>
                <div>
                    <!-- !!! -->
                </div>
                <div>
                    <!-- !!! -->
                </div>
                    <!-- !!! -->
            
            </form>
        </div>
    </div>

    @if ($tasks->isEmpty())
    <div class="alert alert-info">
            Задачи по уканным условиям не найленны.
    </div>
    @else

    @endif
</div>

@endsection
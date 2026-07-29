@extends('layouts.app')

@section('title', 'Новая задача')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-header">
            <div class="card shadow-sm">
                <h1 class="h4 mb-0">
                    Новая задача
                </h1>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('tasks.store') }}" method="post">
                @call_user_func

                @include('tasks._form')

                <div class="d-flex gap-2">
                    <button type="submit" class="btn-btn-primary">
                        Создать задачу
                    </button>

                    <a href="{{ route('tasks.index') }}"
                        class="btn btn-outline-secondary">
                        Отмена
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
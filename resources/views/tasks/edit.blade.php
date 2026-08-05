@extends('layouts.app')
@section('title', 'Новая задача')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <h1 class="h4 mb-0">
            Редактирование задачи
        </h1>
    </div>
    <div class="card-body">
        <form action="{{route ('tasks.update', $task) }}" method="post">
            @csrf
            @method('PUT')
            @include('tasks._form')

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary" >
                    Создать задачу
                </button>

                <a href="{{ route('tasks.show', $task)}}" class="btn btn-outline-secondary">
                    Отмена
                </a>
            </div>

        </form>
    </div>
</div>
@endsection
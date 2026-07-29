@extends('layouts.app')

@section('title', 'Главная')

@section('content')
<div class="p-5 mb-4 bg-white border rounded-3 shadow-sm">
    <div class="container-fluid py-4">
        <h1 class="display-5 fw-bold">
            Laravel Tasks
        </h1>

        <p class="col-lg-9 fs-5">
            Учебное CRUD-приложение на Laravel, демонстрирующие маршруты,
            контроллеры, Blade, Eloquent, миграции, валидацию и Route Model
            Binding
        </p>
        
        <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-lg"> Перейти к задачам </a>
    </div>
    <div class="row g-4">
        <div class="col-mb-4">
            <div class="card n-100 shadow-sm">
                <div class="card-body">
                    <h2 class="h5">
                        Blade View
                    </h2>

                    <p class="mb-0">
                        Blade-шаблоны форматируют интерфейс и используют общий
                        layout
                    </p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h2 class="h5">
                        Resource Controller
                    </h2>

                    <p class="mb-0">
                        Контроллер обрабатывает стандартные CRUD-операции
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
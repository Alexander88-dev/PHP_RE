@extends('layouts.app')
@section('title', 'Главная')
@section('content')
<div class="p-5 mb-4 bg-white border rounded-3 shadow-sm">
    <div class="container-fluid py-4">
        <h1 class="display-5 fw-bold">
            Laravel Tasks
        </h1>

        <p class="col-lg-9 fs-5">
            Учебное CRUD-приложение на Laravel, демонстрирующее маршруты, контроллеры, Blade, Eloquent, миграции, валидацию и Route Model Binding
        </p>

        <a href="{{ route('tasks.index') }}" class="btn btn-lg">Перейти к задачам</a>
    </div>
</div>

<div class="row g-4">
    <div class="col-mb-4">
        <div class="card-body">
            <h2 class="h5">
                Eloquent Model
            </h2>

            <p class="mb-0">
                Модель Task работает с таблицей tasks без ручного написания PDO-кода
            </p>
        </div>
    </div>
</div>

<div class="col-mb-4">
    <div class="card-body">
        <h2 class="h5">
            Blade View
        </h2>

        <p class="mb-0">
            Blade-шаблоны форматируют интерфейс и используют общий layout
        </p>
    </div>
</div>
<div class="col-mb-4">
    <div class="card-body">
        <h2 class="h5">
            Resourse Controller
        </h2>

        <p class="mb-0">
            контроллер обрабатывет стандартные CRUD-операции
        </p>
    </div>
</div>
@endsection
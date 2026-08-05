@extends('layouts.app')

@section('title', 'Новая задача')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h1 class="h4 mb-0">Новая задача</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.store') }}" method="post">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">
                            Создать задачу
                        </button>
                        <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
                            Отмена
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

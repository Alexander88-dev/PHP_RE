@extends('layouts.app')

@session('title', 'Новая задача')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <h1 class="h4 mb-0">Новая задача</h1>
        </div>
    </div>

    <div class="card-body">
        <form action="{{ route('tasks.store') }}" method="post"></form>
    </div>
</div>

@endsection

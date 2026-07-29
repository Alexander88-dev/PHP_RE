<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Tasks')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="" bg-body-tertiary>
    <header class="navbar navbar-expland-lg navbar-dark bg-dark">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">
                Laravel Tasks
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavigation" aria-expanded="false" aria-label="Открыть меню">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="mainNavigation" class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"> <a href="{{route('home'}}" class="nav-link{{ request()->routeIs(home) ?? 'active' : ''}}">
                            Главная
                        </a>
                    </li>

                    <li class="nav-item"><a href="{{route('tasks.index'}}" class="nav-link{{ request()->routeIs(home) ?? 'active' : ''}}">
                            Задачи
                        </a>
                    </li>

                    <li class="nav-item"><a href="{{route('tasks.create'}}" class="nav-link{{ request()->routeIs(home) ?? 'active' : ''}}">
                            Добавить задачу
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <main class="container py-4">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}

            <button type="button" class="btn-close" data-bs-dissmiss="alert" aria-label="Закрыть">

            </button>
        </div>
        @endif

        @if ($erros->any())
        <div class="alert alert-danger">
            <h2 class="h6">
                Исправте ошибки формы
            </h2>

            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error}} </li>
                @endforeach
            </ul>
        </div>
        @endif

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</html>
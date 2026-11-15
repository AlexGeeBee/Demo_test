<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="/">Корочки.есть</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Главная</a>
                    </li>

                    @auth

                    <li class="nav-item">
                        <a class="nav-link" href="/applications">Мои заявки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/applications/create">Новая заявка</a>
                    </li>

                    @if (auth()->user()->role_id == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="/admin">Все заявки</a>
                        </li>
                    @endif
                    @else

                    <li class="nav-item">
                        <a class="nav-link" href="/login">Вход</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Регистрация</a>
                    </li>
                    @endauth
                
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Обратная связь</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                    @auth
                    <x-bf::form url="/logout" method="post">
                        <x-bf::submit>Выйти</x-bf::submit>
                    </x-bf::form>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        @session('error')
            <div class="alert alert-danger" role="alert">
                {{ $value }}
            </div>
        @endsession

        @yield('content')
    </div>

    <script src="{{ asset('assets/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - Controle de Séries</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('series.index') }}">Controle de Séries</a>
            @auth
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            @endauth

            @guest
                @if (!isset($loginForm))
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                @endif
            @endguest
        </div>
    </nav>
    <div class="container mt-2">
        <h1>{{ $title }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ $slot }}

    </div>
</body>

</html>

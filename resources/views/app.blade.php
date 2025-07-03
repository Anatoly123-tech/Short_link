<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<style>
    body{
        background-color: #ffebf2;
    }
    .navbar {
        background-color:  #bb1d38;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('links.index') }}" style="color: #ffebf2;">Сокращение ссылок</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('logout') }}" style="color: #ffebf2;">Выйти</a>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('auth.login') }}" style="color: #ffebf2;">Авторизация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('auth.register') }}" style="color: #ffebf2;">Регистрация</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="py-4">
        @yield('content');
    </div>
</body>

</html>

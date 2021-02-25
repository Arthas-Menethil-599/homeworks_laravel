<!doctype html>
<html lang="{{str_replace('_','-',app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>

<div>
    <a href="{{ route('products.index') }}">
        Продукты
    </a>
    &bull;
    @guest
        <a href="{{ route('login') }}">
            Войти
        </a>
        &bull;
        <a href="{{ route('register') }}">
            Регистрация
        </a>
    @else
        <a>
            {{auth()->user()->name}}
        </a>
        &bull;
        <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Выйти</a>

        <form id="logout-form" action="{{route('logout')}}" method="post">@csrf</form>
    @endguest


</div>

<hr/>

@yield('content')
</body>
</html>

<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Буквоежка</title>
    
</head>
<body>
    <nav>
        @auth
            <a href="{{ route('home') }}">Главная</a>
            <a href="{{ route('cards.index') }}">Мои карточки</a>
            <a href="{{ route('cards.create') }}">Добавить карточку</a>
            @if(auth()->user()->login === 'admin')
                <a href="{{ route('admin.dashboard') }}">Панель админа</a>
            @endif
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Выйти</button>
            </form>
        @else
            <a href="{{ route('login') }}">Войти</a>
            <a href="{{ route('register') }}">Регистрация</a>
        @endauth
    </nav>
    
    <main>
        @yield('content')
    </main>
</body>
</html>
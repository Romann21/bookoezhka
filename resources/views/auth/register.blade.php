<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Регистрация</h1>
<form method="POST" action="{{ route('register') }}">
    @csrf
    
    <div>
        <label>Логин</label>
        <input type="text" name="login" required>
        @error('login') <span>{{ $message }}</span> @enderror
    </div>
    
    <div>
        <label>Пароль (минимум 6 символов)</label>
        <input type="password" name="password" required>
        @error('password') <span>{{ $message }}</span> @enderror
    </div>
    
    <div>
        <label>Фамилия</label>
        <input type="text" name="surname" required>
        @error('surname') <span>{{ $message }}</span> @enderror
    </div>
    
    <div>
        <label>Имя</label>
        <input type="text" name="name" required>
        @error('name') <span>{{ $message }}</span> @enderror
    </div>
    
    <div>
        <label>Отчество</label>
        <input type="text" name="patronymic">
        @error('patronymic') <span>{{ $message }}</span> @enderror
    </div>
    
    <div>
        <label>Телефон</label>
        <input type="tel" name="phone" required>
        @error('phone') <span>{{ $message }}</span> @enderror
    </div>
    
    <div>
        <label>Email</label>
        <input type="email" name="email" required>
        @error('email') <span>{{ $message }}</span> @enderror
    </div>
    
    <button type="submit">Зарегистрироваться</button>
</form>
@endsection
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Панель администратора</h1>

<h2>Карточки на модерации</h2>
@foreach($cards as $card)
    <div>
        <h3>{{ $card->title }}</h3>
        <p>Автор: {{ $card->author }}</p>
        <p>Пользователь: {{ $card->user->name }}</p>
        
        <form action="{{ route('admin.cards.approve', $card) }}" method="POST">
            @csrf
            <button type="submit">Одобрить</button>
        </form>
        
        <form action="{{ route('admin.cards.reject', $card) }}" method="POST">
            @csrf
            <input type="text" name="reason" placeholder="Причина отказа" required>
            <button type="submit">Отклонить</button>
        </form>
    </div>
@endforeach

<h2>Опубликованные карточки</h2>
@foreach($published as $card)
    <div>
        <h3>{{ $card->title }}</h3>
        <p>Автор: {{ $card->author }}</p>
        <p>Пользователь: {{ $card->user->name }}</p>
    </div>
@endforeach
@endsection
</body>
</html>
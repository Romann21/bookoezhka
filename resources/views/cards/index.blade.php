<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/cards/index.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Мои карточки</h1>

<a href="{{ route('cards.create') }}">Создать новую карточку</a>

<h2>Активные карточки</h2>
@foreach($cards as $card)
  <hr>
    <div>
        <h3>{{ $card->title }}</h3>
        <p>Автор: {{ $card->author }}</p>
        <p>Тип: {{ $card->type === 'give' ? 'Готов поделиться' : 'Хочу в библиотеку' }}</p>
    
        
        <form action="{{ route('cards.destroy', $card) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Удалить</button>
        </form>
    </div>
@endforeach

<h2>Архивные карточки</h2>
@foreach($archived as $card)
  <hr>
    <div>
        <h3>{{ $card->title }}</h3>
        <p>Автор: {{ $card->author }}</p>
        <p>Причина: {{ $card->rejection_reason ?? 'Удалено пользователем' }}</p>
    </div>
    <hr>
@endforeach
@endsection 
</body>
</html>
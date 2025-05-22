<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/cards/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Создать новую карточку книги</h1>
    
    <form method="POST" action="{{ route('cards.store') }}">
        @csrf
        
        <div class="form-group">
            <label for="author">Автор книги</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" 
                   id="author" name="author" value="{{ old('author') }}" required>
            @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="title">Название книги</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                   id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label>Тип карточки</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" 
                       id="type_give" value="give" checked>
                <label class="form-check-label" for="type_give">
                    Готов поделиться
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" 
                       id="type_take" value="take">
                <label class="form-check-label" for="type_take">
                    Хочу в свою библиотеку
                </label>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Отправить на модерацию</button>
        <a href="{{ route('cards.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
</div>
@endsection
</body>
</html>
@extends('layouts.app')

@section('title')
    Авторизация
@endsection

@section('content')
    <form method="post" action="{{ route('user.auth') }}">
        @csrf
        <input name="email" type="email" placeholder="E-mail">
        @error('email')
            <span>{{ $message }}</span>
        @enderror
        <input name="password" type="password">
        @error('password')
            <span>{{ $message }}</span>
        @enderror
        <button type="submit">Войти</button>
    </form>
    <a href="{{ route('user.create') }}">Регистрация</a>
@endsection

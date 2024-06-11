@extends('layouts.app')

@section('title')
    Регистрация
@endsection

@section('content')
    <form method="post" action="{{ route('user.store') }}">
        @csrf
        <input name="name" type="text" placeholder="Имя">
        @error('name')
            <span>{{ $message }}</span>
        @enderror

        <input name="surname" type="text" placeholder="Фамилия">
        @error('name')
            <span>{{ $message }}</span>
        @enderror

        <input name="patronymic" type="text" placeholder="Отчество (Не обязательно)">
        @error('name')
            <span>{{ $message }}</span>
        @enderror

        <input name="email" type="text" placeholder="e-mail">
        @error('email')
            <span>{{ $message }}</span>
        @enderror

        <input name="phone_number" type="text" placeholder="Номер телефона">
        @error('phone_number')
            <span>{{ $message }}</span>
        @enderror

        <input name="password" type="password" placeholder="Пароль">
        @error('password')
            <span>{{ $message }}</span>
        @enderror

        <input name="password_confirmation" type="password" placeholder="Потврор пароля">
        @error('password_confirmation')
            <span>{{ $message }}</span>
        @enderror
        <button type="submit">Ввод</button>
    </form>
    <a href="{{ route('user.login') }}">Авторизация</a>
@endsection

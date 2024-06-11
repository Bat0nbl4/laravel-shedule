@extends('layouts.app')

@section('title')
    Создать урок
@endsection

@section('content')
    @foreach($lessons as $lesson)
        <a href="{{ route('lesson.forceDelete', $lesson->id) }}">{{ $lesson->lesson }}</a><br>
    @endforeach
    <form method="post" action="{{ route('lesson.store') }}">
        @csrf
        <input name="lesson" type="text">
        <button type="submit">Ввод</button>
    </form>
@endsection

@extends('layouts.app')

@section('title')
    Создать аудиторию
@endsection

@section('content')
    @foreach($classrooms as $classroom)
        <a href="{{ route('classroom.forceDelete', $classroom->id) }}">{{ $classroom->number }}</a><br>
    @endforeach
    <form method="post" action="{{ route('classroom.store') }}">
        @csrf
        <input name="number" type="text">
        <button type="submit">Ввод</button>
    </form>
@endsection

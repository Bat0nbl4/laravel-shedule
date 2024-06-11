@extends('layouts.app')

@section('title')
    Создать группу
@endsection

@section('content')
    @foreach($groups as $group)
        <a href="{{ route('group.forceDelete', $group->id) }}">{{ $group->group }}</a><br>
    @endforeach
    <form method="post" action="{{ route('group.store') }}">
        @csrf
        <input name="group" type="text">
        <button type="submit">Ввод</button>
    </form>
@endsection

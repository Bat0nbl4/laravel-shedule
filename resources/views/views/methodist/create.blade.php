@extends('layouts.app')

@section('title')
    Утвердить методиста
@endsection

@section('content')
    @foreach($users as $user)
        <span @if(\App\Models\Methodist::where('user_id', $user->id)->first() != null) style="color: red" @endif>{{ $user->id }}: {{ $user->name }} {{ $user->surname }}</span><br>
    @endforeach
    <form method="post" action="{{ route('methodist.store') }}">
        @csrf
        <input name="user_id" type="text">
        <button type="submit">Ввод</button>
    </form>
@endsection

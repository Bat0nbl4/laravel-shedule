@extends('layouts.app')

@section('title')
    Утвердить сотрудника
@endsection

@section('content')
    @foreach($users as $user)
        <span @if(\App\Models\Employee::where('user_id', $user->id)->first() != null) style="color: red" @endif>{{ $user->id }}: {{ $user->name }}</span><br>
    @endforeach
    <form method="post" action="{{ route('employee.store') }}">
        @csrf
        <input name="user_id" type="text">
        <button type="submit">Ввод</button>
    </form>
@endsection

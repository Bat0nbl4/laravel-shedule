@extends('layouts.app')

@section('title')
    Рассписание
@endsection

@section('content')
    @foreach($classrooms as $classroom)
        <a href="{{ route('note.show', ['select_by' => 'number', 'select'=>$classroom->number]) }}">{{ $classroom->number }}</a>
    @endforeach
    <br>
    @foreach($employees as $employee)
        <a href="{{ route('note.show', ['select_by' => 'employee', 'select'=>$employee->id]) }}">{{ $employee->name }} {{ $employee->surname }}</a>
    @endforeach
    <br>
    @foreach($groups as $group)
        <a href="{{ route('note.show', ['select_by' => 'employee', 'select'=>$group->id]) }}">{{ $group->group }}</a>
    @endforeach
@endsection

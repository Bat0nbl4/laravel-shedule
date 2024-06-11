@extends('layouts.app')

@section('title')
    Создать запись
@endsection

@section('content')
    <form method="post" action="{{ route('note.store') }}">
        @csrf
        <select name="classroom">
            @foreach($classrooms as $classroom)
                <option value="{{ $classroom->id }}">{{ $classroom->number }}</option>
            @endforeach
        </select>
        @error('classroom')
            <span>{{ $message }}</span>
        @enderror
        <select name="group">
            @foreach($groups as $group)
                <option value="{{ $group->id }}">{{ $group->group }}</option>
            @endforeach
        </select>
        @error('group')
            <span>{{ $message }}</span>
        @enderror
        <select name="lesson">
            @foreach($lessons as $lesson)
                <option value="{{ $lesson->id }}">{{ $lesson->lesson }}</option>
            @endforeach
        </select>
        @error('lesson')
            <span>{{ $message }}</span>
        @enderror
        <select name="employee">
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
            @endforeach
        </select>
        @error('employees')
            <span>{{ $message }}</span>
        @enderror
        <input type="date" name="date">
        @error('date')
            <span>{{ $message }}</span>
        @enderror
        <select name="time">
            @for($i = 8; $i < 21; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        @error('time')
            <span>{{ $message }}</span>
        @enderror
        <button type="submit">Ввод</button>
    </form>
@endsection

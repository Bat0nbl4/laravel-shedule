@extends('layouts.app')

@section('title')
    Рассписание
@endsection

@section('content')
    <table>
        <tr>
            <td>Аудитория</td>
            <td>Группа</td>
            <td>Предмет</td>
            <td>Сотрудник</td>
            <td>Дата</td>
            <td>Время</td>
        </tr>
        @foreach($notes as $note)
            <tr>
                <td>{{ $note->number }}</td>
                <td>{{ $note->group }}</td>
                <td>{{ $note->lesson }}</td>
                <td>{{ $note->surname }}</td>
                <td>{{ $note->date }}</td>
                <td>{{ $note->time }}</td>
            </tr>
        @endforeach
    </table>
@endsection

@extends('layouts.app')

@section('title')
    Главная
@endsection

@section('content')
    <h2>Личный кабинет</h2>
    <p>{{ auth()->user()->name }} {{ auth()->user()->surname }}</p>
    <p>{{ auth()->user()->email }}</p>
    <a href="{{ route('user.logout') }}">Выход</a>
    @if(session()->get('is_employee'))
        <form method="post" action="{{ route('ask.store') }}">
            @csrf
            <textarea name="ask"></textarea>
            <button type="submit">Ввод</button>
        </form>
    @endif
    @if(session()->get('is_methodist'))
        <span>Ух ты</span>
    @endif
    @if(session()->get('is_admin'))
        <table>
            <tr>
                <td>ID</td>
                <td>Аудитория</td>
                <td>Группа</td>
                <td>Предмет</td>
                <td>Сотрудник</td>
                <td>Дата</td>
                <td>Время</td>
                <td>Подтверждено</td>
            </tr>
            @foreach($notes as $note)
                <tr>
                    <td>{{ $note->id }}</td>
                    <td>{{ $note->number }}</td>
                    <td>{{ $note->group }}</td>
                    <td>{{ $note->lesson }}</td>
                    <td>{{ $note->surname }}</td>
                    <td>{{ $note->date }}</td>
                    <td>{{ $note->time }}</td>
                    <td>
                        @if($note->confirmed)
                            <span>Подтверждено</span>
                        @else
                            <a href="{{ route('note.confirm', ['id' => $note->id]) }}">Подтвердить</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        <table>
            <tr>
                <td>ID</td>
                <td>Author</td>
                <td>Ask</td>
                <td>Confirm</td>
            </tr>
            @foreach($asks as $ask)
                <tr>
                    <td>{{ $ask->id }}</td>
                    <td>{{ $ask->name }} {{ $ask->surname }}</td>
                    <td>{{ $ask->ask }}</td>
                    <td><a href="{{ route('ask.confirm', ['id' => $ask->id]) }}">Confirm</a></td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection

@extends('layouts.app')

@section('title')
    Подача заявкм на изменение рассписания
@endsection

@section('content')
    <form>
        <textarea name="ask"></textarea>
        <button type="submit">Ввод</button>
    </form>
@endsection

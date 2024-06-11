<header>
    <a href="{{ route('index') }}"><h1>Header</h1></a>
    @if(auth()->user())
        <a href="{{ route('user.lk') }}">{{ auth()->user()->name }}</a>
    @else
        <a href="{{ route('user.login') }}">Войти</a>
    @endif
</header>

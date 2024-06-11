<footer>
    <a href="{{ route('classroom.create') }}">classroom</a><br>
    <a href="{{ route('group.create') }}">group</a><br>
    <a href="{{ route('employee.create') }}">employee</a><br>
    <a href="{{ route('methodist.create') }}">methodist</a><br>
    <a href="{{ route('lesson.create') }}">lesson</a><br>
    <a href="{{ route('note.create') }}">note</a><br>
    <a href="{{ route('note.select') }}">Расписание</a><br>
    <pre>
        {{ print_r(session()->all()) }}
    </pre>
</footer>

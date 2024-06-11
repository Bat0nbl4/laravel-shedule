<?php

namespace App\Http\Controllers\note;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Classroom;

class NoteController extends Controller
{
    public function create() {
        $classrooms = Classroom::all();
        $groups = Group::all();
        $employees = Employee::select('employees.*', 'users.name')
            ->join('users', 'employees.user_id', '=', 'users.id')
            ->get();
        $lessons = Lesson::all();
        return view('views/note/create')->with(['classrooms' => $classrooms, 'groups' => $groups, 'employees' => $employees, 'lessons' => $lessons]);
    }

    public function show($select_by, $select) {
        $notes = Note::where('confirmed', true)
            ->select('notes.id', 'notes.date', 'notes.time', 'users.surname', 'classrooms.number', 'groups.group', 'lessons.lesson')
            ->join('users', 'notes.employee', '=', 'users.id')
            ->join('classrooms', 'notes.classroom', '=', 'classrooms.id')
            ->join('groups', 'notes.group', '=', 'groups.id')
            ->join('lessons', 'notes.lesson', '=', 'lessons.id')
            ->where($select_by, $select)
            ->get();

        return view('views/note/show')->with(['notes' => $notes]);
    }

    public function select() {
        $classrooms = Classroom::all();
        $employees = Employee::select('employees.*', 'users.name', 'users.surname')
            ->join('users', 'employees.user_id', '=', 'users.id')
            ->get();
        $groups = Group::all();

        return view('views/note/select')->with(['classrooms' => $classrooms, 'employees' => $employees, 'groups' => $groups]);
    }
}

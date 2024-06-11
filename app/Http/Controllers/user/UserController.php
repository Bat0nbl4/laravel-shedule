<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Ask;
use App\Models\Employee;
use App\Models\Methodist;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Termwind\ask;

class UserController extends Controller
{
    public function login() {
        return view('views/user/login');
    }

    public function create() {
        return view('views/user/create');
    }

    public function lk() {

        $notes = null;
        $asks = null;

        if ( Admin::where('user_id', auth()->id())->exists() ) {
            session()->put(['is_admin' => true]);

            $notes = Note::select('notes.id', 'notes.date', 'notes.time', 'notes.confirmed', 'users.surname', 'classrooms.number', 'groups.group', 'lessons.lesson')
                ->join('users', 'notes.employee', '=', 'users.id')
                ->join('classrooms', 'notes.classroom', '=', 'classrooms.id')
                ->join('groups', 'notes.group', '=', 'groups.id')
                ->join('lessons', 'notes.lesson', '=', 'lessons.id')
                ->get();
            $asks = Ask::where('asks.confirmed', '=', false)
                ->select('asks.*', 'users.name', 'users.surname')
                ->join('users', 'asks.user_id', '=', 'users.id')
                ->get();
        }

        if ( Employee::where('user_id', auth()->id())->exists() ) {
            session()->put(['is_employee' => true]);
        }

        if ( Methodist::where('user_id', auth()->id())->exists() ) {
            session()->put(['is_methodist' => true]);
        }

        return view('views/user/lk')->with(['notes' => $notes, 'asks' => $asks]);
    }
}

<?php

namespace App\Http\Controllers\methodist;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MethodistController extends Controller
{
    public function create() {
        $users = User::all();
        return view('views/methodist/create')->with(['users' => $users]);
    }
}

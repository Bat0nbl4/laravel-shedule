<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create() {
        $users = User::all();
        return view('views/employee/create')->with(['users' => $users]);
    }
}

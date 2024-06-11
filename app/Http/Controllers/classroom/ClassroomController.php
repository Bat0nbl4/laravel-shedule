<?php

namespace App\Http\Controllers\classroom;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function create() {
        $classrooms = Classroom::all();
        return view('views/classroom/create')->with(['classrooms' => $classrooms]);
    }
}

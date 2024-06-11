<?php

namespace App\Http\Controllers\lesson;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function create() {
        $lessons = Lesson::all();
        return view('views/lesson/create')->with(['lessons' => $lessons]);
    }
}

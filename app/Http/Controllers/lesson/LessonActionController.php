<?php

namespace App\Http\Controllers\lesson;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonActionController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate(['lesson' => 'required|max:255|unique:lessons']);
        Lesson::create($validated);
        return redirect(route('lesson.create'));
    }

    public function forceDelete($id) {
        Lesson::findOrFail($id)->delete();
        return redirect()->back();
    }
}

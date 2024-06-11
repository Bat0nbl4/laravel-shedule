<?php

namespace App\Http\Controllers\classroom;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomActionController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate(['number' => 'required|max:255|unique:classrooms']);
        Classroom::create($validated);
        return redirect()->back();
    }

    public function forceDelete($id) {
        Classroom::findOrFail($id)->delete();
        return redirect()->back();
    }
}

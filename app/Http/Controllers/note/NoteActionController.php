<?php

namespace App\Http\Controllers\note;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteActionController extends Controller
{
    public function store(NoteRequest $request) {
        $validated = $request->validated();
        if (!(
            Note::where('group', $request->group)->where('date', $request->date)->where('time', $request->time)->exists() and
            Note::where('classroom', $request->group)->where('date', $request->date)->where('time', $request->time)->exists() and
            Note::where('employee', $request->group)->where('date', $request->date)->where('time', $request->time)->exists()
            )) {
            Note::create($validated);
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function forceDelete($id) {
        Note::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function confirm($id) {
        $note = Note::findOrFail($id);
        $note->update(['confirmed' => true]);
        return redirect()->back();
    }
}

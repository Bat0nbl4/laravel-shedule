<?php

namespace App\Http\Controllers\methodist;

use App\Http\Controllers\Controller;
use App\Models\Methodist;
use Illuminate\Http\Request;

class MethodistActionController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate(['user_id' => 'required|int|max:255']);
        Methodist::create($validated);
        return redirect()->back();
    }

    public function forceDelete($id) {
        Methodist::findOrFail($id)->delete();
        return redirect()->back();
    }
}

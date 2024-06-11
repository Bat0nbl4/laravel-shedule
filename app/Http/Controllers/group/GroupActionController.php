<?php

namespace App\Http\Controllers\group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupActionController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate(['group' => 'required|max:255']);
        Group::create($validated);
        return redirect()->back();
    }

    public function forceDelete($id) {
        Group::findOrFail($id)->delete();
        return redirect()->back();
    }
}

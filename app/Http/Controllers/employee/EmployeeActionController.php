<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeActionController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate(['user_id' => 'required|max:255']);
        Employee::create($validated);
        return redirect()->back();
    }

    public function forceDelete($id) {
        Employee::findOrFail($id)->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\ask;

use App\Http\Controllers\Controller;
use App\Models\Ask;
use Illuminate\Http\Request;

class AskActionController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate([
            'ask' => 'required|min:10',
        ]);
        $ask = Ask::create($validated + ['user_id' => auth()->id()]);
        if ($ask) {
            return redirect()->route('user.lk');
        }
        return redirect()->back()->withErrors();
    }

    public function confirm($id) {
        $ask = Ask::where('id', $id)->first();
        $ask->update(['confirmed' => true]);
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\ask;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AskController extends Controller
{
    public function create() {
        return view('views.ask.create');
    }
}

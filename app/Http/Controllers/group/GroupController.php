<?php

namespace App\Http\Controllers\group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function create() {
        $groups = Group::all();
        return view('views/group/create')->with(['groups' => $groups]);
    }
}

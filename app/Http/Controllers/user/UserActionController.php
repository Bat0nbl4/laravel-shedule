<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Methodist;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserActionController extends Controller
{
    public function store(UserRequest $request) {
        $data = $request->validated();

        $user = User::create($data);
        if($user) {
            auth('web')->login($user);
        }

        return redirect(route('users.lk'));
    }

    public function auth(Request $request) {
        if (auth('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Employee::where('user_id', auth()->id())->exists()) {
                session()->put(['is_employee' => true]);
            }
            if (Admin::where('user_id', auth()->id())->exists()) {
                session()->put(['is_admin' => true]);
            }
            if (Methodist::where('user_id', auth()->id())->exists()) {
                session()->put(['is_methodist' => true]);
            }
            return redirect(route('user.lk'));
        }
        return redirect()->back()->withErrors(['login' => 'Неверный логин или пароль']);
    }

    public function logout() {
        auth('web')->logout();
        session()->flush();
        return redirect(route('user.login'));
    }
}

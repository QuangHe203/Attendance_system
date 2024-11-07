<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = DB::table('users')->where('usename', $request->input('username'))->first();

        if (!$user) {
            return redirect()->back()->withErrors([
                'username' => 'Tên đăng nhập không chính xác',
            ])->withInput();
        }

        if ($request->input('password') !== $user->password) {
            return redirect()->back()->withErrors([
                'password' => 'Mật khẩu không chính xác',
            ])->withInput();
        }

        session(['user' => $user]);

        if ($user->role === 'teacher') {
            return redirect()->route('teacher.account_management');
        } elseif ($user->role === 'student') {
            return redirect()->route('student.account_management');
        } else {
            return redirect()->route('admin.account_management');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

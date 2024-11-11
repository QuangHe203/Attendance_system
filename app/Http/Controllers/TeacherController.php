<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;

class TeacherController extends Controller
{
    public function showAccountInf()
    {
        $loggedInUser = session('user');
        $user = User::where('user_id', '=', $loggedInUser->user_id)->first();
        if ($user) {
            $teacher = Teacher::where('teacher_id', $user->reference_id)->first();
            $user->fullname = $teacher ? $teacher->fullname : 'N/A';
            $user->phonenumber = $teacher ? $teacher->phonenumber : 'N/A';
            $user->email = $teacher ? $teacher->email : 'N/A';
            $user->image = $teacher ? $teacher->image : 'N/A';
            $user->department = $teacher ? $teacher->department : 'N/A';
        }

        return view('teacher.teacher_account_management', compact('user'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;

class StudentController extends Controller
{
    public function showAccountInf()
    {
        $loggedInUser = session('user');
        $user = User::where('user_id', '=', $loggedInUser->user_id)->first();
        if ($user) {
            $student = Student::where('student_id', $user->reference_id)->first();
            $user->fullname = $student ? $student->fullname : 'N/A';
            $user->phonenumber = $student ? $student->phonenumber : 'N/A';
            $user->email = $student ? $student->email : 'N/A';
            $user->image = $student ? $student->image : 'N/A';
        }

        return view('student.student_account_management', compact('user'));
    }
}

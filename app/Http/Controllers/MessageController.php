<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;


class MessageController extends Controller
{
    public function showForm()
    {
        $loggedInUser = session('user'); 
        $users = User::where('user_id', '<>', $loggedInUser->user_id)->get();

        foreach ($users as $user) {
            if ($user->role == 'student') {
                $student = Student::where('student_id', $user->reference_id)->first();
                $user->fullname = $student ? $student->fullname : 'N/A';
            } elseif ($user->role == 'teacher') {
                $teacher = Teacher::where('teacher_id', $user->reference_id)->first();
                $user->fullname = $teacher ? $teacher->fullname : 'N/A';
            }
        }

        return view('send_message', compact('users', 'loggedInUser'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'id_sender' => 'required|string',
            'id_receiver' => 'required|string',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        Message::create([
            'id_sender' => $request->input('id_sender'),
            'id_receiver' => $request->input('id_receiver'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Tin nhắn đã được gửi!');
    }
}

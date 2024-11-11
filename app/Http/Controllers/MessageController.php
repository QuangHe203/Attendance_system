<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;


class MessageController extends Controller
{
    public function getInfo()
    {
        $loggedInUser = session('user');
        $user_id = $loggedInUser->user_id;

        $courses = DB::table('Users')
            ->join('Students', 'users.reference_id', '=', 'students.student_id')
            ->join('student_lists', 'students.student_id', '=', 'student_lists.student_id')
            ->join('courses', 'student_lists.course_name', '=', 'courses.course_name')
            ->select(
                'courses.course_name',
            )
            ->where('users.user_id', $user_id)
            ->distinct()
            ->get();
        return view('student.student_mailbox_management', compact('courses'));
    }

    public function sendMessage(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'title' => 'required|string|max:255',
            'main-content' => 'required|string',
            'student-teacher' => 'required|string',
            'classes' => 'required|string',
        ]);

        $loggedInUser = session('user');
        $id_sender = $loggedInUser->user_id;
        $id_receiver = $request->input('student-teacher');
        $title = $request->input('title');
        $content = $request->input('main-content');
        $course_name = $request->input('classes');

        // Lưu tin nhắn vào bảng messages
        Message::create([
            'id_sender' => $id_sender,
            'id_receiver' => $id_receiver,
            'title' => $title,
            'content' => $content,
            'course_name' => $course_name,
        ]);

        // Chuyển hướng hoặc trả về thông báo thành công
        return redirect()->back()->with('success', 'Tin nhắn đã được gửi thành công.');
    }

    public function getStudent(Request $request)
    {
        $course_name = $request->input('course_name');

        $students = DB::table('courses')
            ->join('student_lists', 'courses.course_name', '=', 'student_lists.course_name')
            ->join('students', 'student_lists.student_id', '=', 'students.student_id')
            ->select('students.student_id as student_id', 'students.fullname as student_name')
            ->where('courses.course_name', $course_name)
            ->get();

        if ($students->count() > 0) {
            $table = '';
            foreach ($students as $student) {
                $table .= '<li onclick="selectOption(\'' . $student->student_name . '\', \'' . $student->student_id . '\')">' . $student->student_name . '</li>';
            }
            return response()->json(['table' => $table]);
        }
    }

    public function getTeacher(Request $request)
    {
        $course_name = $request->input('course_name');

        $teachers = DB::table('courses')
            ->join('teachers', 'courses.teacher_id', '=', 'teachers.teacher_id')
            ->select('teachers.teacher_id as student_id', 'teachers.fullname as teacher_name')
            ->where('courses.course_name', $course_name)
            ->get();

        if ($teachers->count() > 0) {
            $table = '';
            foreach ($teachers as $teacher) {
                $table .= '<li onclick="selectOption(this)">' . $teacher->teacher_name . '</li>';
            }
            return response()->json(['table' => $table]);
        }
    }
}

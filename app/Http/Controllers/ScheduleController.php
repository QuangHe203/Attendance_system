<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function showStudentSchedule(Request $request)
    {
        $loggedInUser = session('user');
        $user_id = $loggedInUser->user_id;

        $schedules = DB::table('Users')
            ->join('Students', 'users.reference_id', '=', 'students.student_id')
            ->join('student_lists', 'students.student_id', '=', 'student_lists.student_id')
            ->join('courses', 'student_lists.course_name', '=', 'courses.course_name')
            ->join('periods', 'courses.course_name', '=', 'periods.course_name')
            ->select(
                'courses.subject_name',
                'periods.location',
                DB::raw('DATE(periods.time_start) as day'),
                DB::raw('TIME(periods.time_start) as time_start'),
                DB::raw('TIME(periods.time_end) as time_end'),
            )
            ->where('users.user_id', $user_id)
            ->orderBy('periods.time_start')
            ->get();

        return view('student.student_schedule_management', compact('schedules'));
    }
}

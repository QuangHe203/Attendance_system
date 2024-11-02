<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAttendanceResult;
use Illuminate\Support\Facades\DB;

class StudentAttendanceResultController extends Controller
{
    public function index()
    {
        $subjects = StudentAttendanceResult::join('students', 'student_attendance_results.student_id', '=', 'students.student_id')
        ->join('periods', 'student_attendance_results.period_id', '=', 'periods.period_id')
        ->join('courses', 'periods.course_name', '=', 'courses.course_name')
        ->select('courses.subject_name')
        ->distinct()
        ->pluck('subject_name');

        $student_attendance_results = StudentAttendanceResult::join('students', 'student_attendance_results.student_id', '=', 'students.student_id')
            ->join('periods', 'student_attendance_results.period_id', '=', 'periods.period_id')
            ->join('courses', 'periods.course_name', '=', 'courses.course_name')
            ->select(
                'courses.course_name',
                'courses.subject_name',
                'students.student_id',
                'students.fullname as student_name',
                DB::raw('DATE(student_attendance_results.time_attend) as date_attendance'),
                DB::raw('TIME(student_attendance_results.time_attend) as time_attendance'),
                'student_attendance_results.status'
            )
            ->paginate(10);

        return view('admin.admin_attendance_results', compact('student_attendance_results', 'subjects'));
    }
}

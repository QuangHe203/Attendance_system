<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAttendanceResult;
use Illuminate\Support\Facades\DB;

class StudentAttendanceResultController extends Controller
{
    public function index()
    {
        // Truy vấn kết quả điểm danh của sinh viên
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

        // Trả về view với dữ liệu kết quả điểm danh
        return view('admin.admin_attendance_results', compact('student_attendance_results'));
    }
}

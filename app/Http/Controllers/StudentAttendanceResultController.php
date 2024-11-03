<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAttendanceResult;
use Illuminate\Support\Facades\DB;

class StudentAttendanceResultController extends Controller
{
    public function index()
    {
        // Lấy danh sách các môn học không trùng lặp
        $subjects = StudentAttendanceResult::join('students', 'student_attendance_results.student_id', '=', 'students.student_id')
            ->join('periods', 'student_attendance_results.period_id', '=', 'periods.period_id')
            ->join('courses', 'periods.course_name', '=', 'courses.course_name')
            ->select('courses.subject_name')
            ->distinct()
            ->pluck('subject_name');

        // Lấy kết quả điểm danh sinh viên
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

        // Lấy kết quả điểm danh giáo viên
        $teacher_attendance_results = DB::table('teacher_attendance_results')
            ->join('teachers', 'teacher_attendance_results.teacher_id', '=', 'teachers.teacher_id')
            ->join('periods', 'teacher_attendance_results.period_id', '=', 'periods.period_id')
            ->select(
                'teacher_attendance_results.period_id',
                'teachers.teacher_id',
                'teachers.fullname as teacher_name', // đổi tên cột để tránh nhầm lẫn với student_name
                'teachers.email',
                'teachers.department',
                DB::raw('DATE(teacher_attendance_results.time_attend) as date_attendance'),
                DB::raw('TIME(teacher_attendance_results.time_attend) as time_attendance'),
            )
            ->get();

        // Lấy danh sách các phòng ban không trùng lặp từ bảng giáo viên
        $departments = DB::table('teachers')
            ->select('department')
            ->distinct()
            ->pluck('department');

        return view('admin.admin_attendance_results', compact('student_attendance_results', 'subjects', 'teacher_attendance_results', 'departments'));
    }


    public function search(Request $request)
    {
        $student_id = $request->input('student_id');
        $subject = $request->input('subject');

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
            );

        if ($student_id) {
            $student_attendance_results->where('students.student_id', 'like', "%{$student_id}%");
        }

        if ($subject) {
            $student_attendance_results->where('courses.subject_name', 'like', "%{$subject}%");
        }

        $student_attendance_results = $student_attendance_results->paginate(10);

        if ($student_attendance_results->count() > 0) {
            $table = '';
            foreach ($student_attendance_results as $result) {
                $table .= "
                <tr>
                    <td>{$result->course_name}</td>
                    <td>{$result->subject_name}</td>
                    <td>{$result->student_id}</td>
                    <td style='text-align: start; padding-left: 5px;'>{$result->student_name}</td>
                    <td>{$result->time_attendance}</td>
                    <td>{$result->date_attendance}</td>
                    <td>{$result->status}</td>
                </tr>
                ";
            }
            return response()->json(['table' => $table]);
        }

        return response()->json(['message' => 'Không tìm thấy kết quả nào']);
    }


    /*
    public function list(Request $request) {
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
            )->paginate(10);
    
        if ($student_attendance_results->count() > 0) {
            $table = '';
            foreach ($student_attendance_results as $result) {
                $table .= "
                <tr>
                    <td>{$result->course_name}</td>
                    <td>{$result->subject_name}</td>
                    <td>{$result->student_id}</td>
                    <td style='text-align: start; padding-left: 5px;'>{$result->student_name}</td>
                    <td>{$result->time_attendance}</td>
                    <td>{$result->date_attendance}</td>
                    <td>{$result->status}</td>
                </tr>
                ";
            }
            return response()->json(['table' => $table]);
        }
    
        return response()->json(['message' => 'Không tìm thấy kết quả nào']);
    }
        */
}

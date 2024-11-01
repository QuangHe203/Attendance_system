<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
<<<<<<< HEAD
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

    public function search(Request $request) {
        $query = $request->input('q');
    
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
    
        if ($query) {
            $student_attendance_results->where('students.fullname', 'like', "%{$query}%");
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
    
=======

class StudentAttendanceResultController extends Controller
{
    //
>>>>>>> e37b194 (update)
=======
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
            ->get();

        // Trả về view với dữ liệu kết quả điểm danh
        return view('admin.admin_attendance_results', compact('student_attendance_results'));
    }
>>>>>>> 9f007ce (update)
}

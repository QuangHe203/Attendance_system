<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherAttendanceResultController extends Controller
{
    public function search(Request $request) {
        $teacher_id = $request->input('teacher_id');
        $department = $request->input('department');
    
        $teacher_attendance_results = DB::table('teacher_attendance_results')
            ->join('teachers', 'teacher_attendance_results.teacher_id', '=', 'teachers.teacher_id')
            ->join('periods', 'teacher_attendance_results.period_id', '=', 'periods.period_id')
            ->select(
                'teacher_attendance_results.period_id',
                'teachers.teacher_id',
                'teachers.fullname as teacher_name',
                'teachers.email',
                'teachers.department',
                DB::raw('DATE(teacher_attendance_results.time_attend) as date_attendance'),
                DB::raw('TIME(teacher_attendance_results.time_attend) as time_attendance'),
            );
    
            if ($teacher_id) {
                $teacher_attendance_results->where('teachers.teacher_id', 'like', "%{$teacher_id}%");
            }
            
            if ($department) {
                $teacher_attendance_results->where('teachers.department', 'like', "%{$department}%");
            }
    
        $teacher_attendance_results = $teacher_attendance_results->paginate(10);
    
        if ($teacher_attendance_results->total() > 0) {
            $table = '';
            foreach ($teacher_attendance_results as $result) {
                $table .= "
                <tr>
                    <td>{$result->period_id}</td>
                            <td>{$result->teacher_id}</td>
                            <td style='text-align: start; padding-left: 5px;'>{$result->teacher_name}</td>
                            <td>{$result->email}</td>
                            <td>{$result->department}</td>
                            <td>{$result->date_attendance}</td>
                            <td>{$result->time_attendance}</td>
                </tr>
                ";
            }
            return response()->json(['table' => $table]);
        }
    
        return response()->json(['message' => 'Không tìm thấy kết quả nào']);
    }
    
}

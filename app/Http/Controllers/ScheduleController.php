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

    public function getCalendar($month, $year)
    {
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $firstDayOfMonth = strtotime("$year-$month-01");
        $firstDayOfWeek = date('N', $firstDayOfMonth); // 1 (Monday) - 7 (Sunday)

        // Tạo mảng để chứa ngày
        $calendar = [];
        $week = [];

        // Thêm các ngày trống trước khi bắt đầu tháng
        for ($i = 1; $i < $firstDayOfWeek; $i++) {
            $week[] = '';
        }

        // Thêm ngày của tháng
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $week[] = $day;

            // Nếu tuần đầy, thêm vào lịch
            if (count($week) === 7) {
                $calendar[] = $week;
                $week = [];
            }
        }

        // Thêm tuần còn lại nếu có
        if (count($week) > 0) {
            while (count($week) < 7) {
                $week[] = ''; // Thêm các ngày trống vào cuối tuần
            }
            $calendar[] = $week;
        }

        return response()->json($calendar);
    }
}

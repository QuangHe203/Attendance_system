<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function getCalendar($month, $year)
    {
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $firstDayOfMonth = strtotime("$year-$month-01");
        $firstDayOfWeek = date('N', $firstDayOfMonth);

        $calendar = [];
        $week = [];

        for ($i = 1; $i < $firstDayOfWeek; $i++) {
            $week[] = '';
        }

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $week[] = $day;

            if (count($week) === 7) {
                $calendar[] = $week;
                $week = [];
            }
        }

        if (count($week) > 0) {
            while (count($week) < 7) {
                $week[] = '';
            }
            $calendar[] = $week;
        }

        return response()->json($calendar);
    }

    public function getStudentSchedule($day, $month, $year)
    {
        // Sử dụng Carbon để tạo đối tượng ngày tháng
        $date = Carbon::createFromDate($year, $month, $day);

        // Tính toán bắt đầu và kết thúc của tuần
        $startOfWeek = $date->startOfWeek()->format('Y-m-d'); // Chủ Nhật đầu tuần
        $endOfWeek = $date->endOfWeek()->format('Y-m-d'); // Thứ Bảy cuối tuần

        $loggedInUser = session('user');
        $user_id = $loggedInUser->user_id;

        // Truy vấn lịch học của người dùng trong tuần
        $schedules = DB::table('Users')
            ->join('Students', 'users.reference_id', '=', 'students.student_id')
            ->join('student_lists', 'students.student_id', '=', 'student_lists.student_id')
            ->join('courses', 'student_lists.course_name', '=', 'courses.course_name')
            ->join('periods', 'courses.course_name', '=', 'periods.course_name')
            ->select(
                'courses.subject_name',
                'periods.location',
                DB::raw('DATE(periods.time_start) as day'), // Chuyển đổi thời gian start thành ngày
                DB::raw('TIME(periods.time_start) as time_start'),
                DB::raw('TIME(periods.time_end) as time_end')
            )
            ->where('users.user_id', $user_id)
            // Sử dụng whereBetween để lọc các bản ghi trong khoảng thời gian từ $startOfWeek đến $endOfWeek
            ->whereBetween(DB::raw('DATE(periods.time_start)'), [$startOfWeek, $endOfWeek])
            ->orderBy('periods.time_start')
            ->get();

        // Trả về kết quả dưới dạng JSON
        return response()->json(['schedule' => $schedules]);
    }

    public function getTeacherSchedule($day, $month, $year)
    {
        // Sử dụng Carbon để tạo đối tượng ngày tháng
        $date = Carbon::createFromDate($year, $month, $day);

        // Tính toán bắt đầu và kết thúc của tuần
        $startOfWeek = $date->startOfWeek()->format('Y-m-d'); // Chủ Nhật đầu tuần
        $endOfWeek = $date->endOfWeek()->format('Y-m-d'); // Thứ Bảy cuối tuần

        $loggedInUser = session('user');
        $user_id = $loggedInUser->user_id;

        // Truy vấn lịch học của người dùng trong tuần
        $schedules = DB::table('Users')
            ->join('Teachers', 'users.reference_id', '=', 'teachers.teacher_id')
            ->join('courses', 'teachers.teacher_id', '=', 'courses.teacher_id')
            ->join('periods', 'courses.course_name', '=', 'periods.course_name')
            ->select(
                'courses.subject_name',
                'periods.location',
                DB::raw('DATE(periods.time_start) as day'), // Chuyển đổi thời gian start thành ngày
                DB::raw('TIME(periods.time_start) as time_start'),
                DB::raw('TIME(periods.time_end) as time_end')
            )
            ->where('users.user_id', $user_id)
            // Sử dụng whereBetween để lọc các bản ghi trong khoảng thời gian từ $startOfWeek đến $endOfWeek
            ->whereBetween(DB::raw('DATE(periods.time_start)'), [$startOfWeek, $endOfWeek])
            ->orderBy('periods.time_start')
            ->get();

        // Trả về kết quả dưới dạng JSON
        return response()->json(['schedule' => $schedules]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;use Illuminate\Support\Facades\DB;

class TeacherAttendanceResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teacher_attendance_results')->insert([
            [
                'teacher_id'=>'GV01',
                'period_id'=>'2',
                'time_attend'=>'2024-10-01 06:50:23',
                'status' => '0',
            ],
            [
                'teacher_id'=>'GV01',
                'period_id'=>'3',
                'time_attend'=>'2024-10-08 06:50:23',
                'status' => '0',
            ],
            [
                'teacher_id'=>'GV01',
                'period_id'=>'4',
                'time_attend'=>'2024-10-15 06:50:23',
                'status' => '0',
            ],
            [
                'teacher_id'=>'GV02',
                'period_id'=>'7',
                'time_attend'=>'2024-10-02 06:50:23',
                'status' => '0',
            ],[
                'teacher_id'=>'GV02',
                'period_id'=>'8',
                'time_attend'=>'2024-10-09 06:50:23',
                'status' => '0',
            ],[
                'teacher_id'=>'GV02',
                'period_id'=>'9',
                'time_attend'=>'2024-10-16 06:50:23',
                'status' => '0',
            ],
        ]);
    }
}

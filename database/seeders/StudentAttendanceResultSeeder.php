<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentAttendanceResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_attendance_results')->insert([
            [
                'student_id'=>'Sv01',
                'period_id'=>'2',
                'time_attend'=>'2024-10-01 06:50:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv02',
                'period_id'=>'2',
                'time_attend'=>'2024-10-01 06:50:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv03',
                'period_id'=>'2',
                'time_attend'=>'2024-10-01 06:50:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv04',
                'period_id'=>'2',
                'time_attend'=>'2024-10-01 06:50:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv05',
                'period_id'=>'2',
                'time_attend'=>'2024-10-01 06:50:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv01',
                'period_id'=>'3',
                'time_attend'=>'2024-10-08 06:50:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv02',
                'period_id'=>'3',
                'time_attend'=>'2024-10-08 06:50:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv03',
                'period_id'=>'3',
                'time_attend'=>'2024-10-08 06:50:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv04',
                'period_id'=>'3',
                'time_attend'=>'2024-10-08 06:50:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv05',
                'period_id'=>'3',
                'time_attend'=>'2024-10-08 06:50:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv01',
                'period_id'=>'4',
                'time_attend'=>'2024-10-15 06:50:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv02',
                'period_id'=>'4',
                'time_attend'=>'2024-10-15 06:50:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv03',
                'period_id'=>'4',
                'time_attend'=>'2024-10-15 06:50:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv04',
                'period_id'=>'4',
                'time_attend'=>'2024-10-15 06:50:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv05',
                'period_id'=>'4',
                'time_attend'=>'2024-10-15 06:50:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv06',
                'period_id'=>'7',
                'time_attend'=>'2024-10-02 09:35:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv07',
                'period_id'=>'7',
                'time_attend'=>'2024-10-02 09:35:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv08',
                'period_id'=>'7',
                'time_attend'=>'2024-10-02 09:35:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv09',
                'period_id'=>'7',
                'time_attend'=>'2024-10-02 09:35:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv10',
                'period_id'=>'7',
                'time_attend'=>'2024-10-02 09:35:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv06',
                'period_id'=>'8',
                'time_attend'=>'2024-10-09 09:35:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv07',
                'period_id'=>'8',
                'time_attend'=>'2024-10-09 09:35:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            [
                'student_id'=>'Sv08',
                'period_id'=>'8',
                'time_attend'=>'2024-10-09 09:35:23',
                'created_at'=>now(),
                'updated_at'=> now(),
            ],
            

        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_lists')->insert([
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'student_id'=>'Sv01',
            ],
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'student_id'=>'Sv02',
            ],
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'student_id'=>'Sv03',
            ],
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'student_id'=>'Sv04',
            ],
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'student_id'=>'Sv05',
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'student_id'=>'Sv06',
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'student_id'=>'Sv07',
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'student_id'=>'Sv08',
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'student_id'=>'Sv09',
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'student_id'=>'Sv10',
            ],
        ]);
    }
}

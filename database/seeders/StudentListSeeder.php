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
                'student_id'=>'SV01',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'student_id'=>'SV02',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'student_id'=>'SV03',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'student_id'=>'SV04',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'student_id'=>'SV05',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'student_id'=>'SV06',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'student_id'=>'SV07',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'student_id'=>'SV08',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'student_id'=>'SV09',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'student_id'=>'SV10',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}

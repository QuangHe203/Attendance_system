<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'teacher_id'=>'GV01',
                'subject_name'=>'Phân tích và thiết kế phần mềm',
                'department'=>'Công nghệ thông tin',
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'teacher_id'=>'GV02',
                'subject_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn',
                'department'=>'Ngôn ngữ Hàn Quốc',
            ],
        ]);
    }
}

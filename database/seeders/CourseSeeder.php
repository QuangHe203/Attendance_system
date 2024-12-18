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
                'semester_name'=>'Kì I 2024-2025 CNTT'
            ],
            [
                'course_name'=>'Khai phá dữ liệu N23_2024',
                'teacher_id'=>'GV01',
                'subject_name'=>'Khai phá dữ liệu',
                'department'=>'Công nghệ thông tin',
                'semester_name'=>'Kì I 2024-2025 CNTT'
            ],
            [
                'course_name'=>'Xử lý ngôn ngữ tự nhiên N03_2024',
                'teacher_id'=>'GV01',
                'subject_name'=>'Xử lý ngôn ngữ tự nhiên',
                'department'=>'Công nghệ thông tin',
                'semester_name'=>'Kì II 2024-2025 CNTT'
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'teacher_id'=>'GV02',
                'subject_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn',
                'department'=>'Ngôn ngữ Hàn Quốc',
                'semester_name'=>'Kì I 2024-2025 NNHQ'
            ],
        ]);
    }
}

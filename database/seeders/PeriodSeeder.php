<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periods')->insert([
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'time_start'=>'2024-10-01 06:45:00',
                'time_end'=>'2024-10-01 09:30:00',
                'location'=>'A6-402',
            ],
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'time_start'=>'2024-10-08 06:45:00',
                'time_end'=>'2024-10-08 09:30:00',
                'location'=>'A6-402',
            ],
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'time_start'=>'2024-10-15 06:45:00',
                'time_end'=>'2024-10-15 09:30:00',
                'location'=>'A6-402',
            ],
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'time_start'=>'2024-10-22 06:45:00',
                'time_end'=>'2024-10-22 09:30:00',
                'location'=>'A6-402',
            ],
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'time_start'=>'2024-10-29 06:45:00',
                'time_end'=>'2024-10-29 09:30:00',
                'location'=>'A6-402',
            ],
            [
                'course_name'=>'Khai phá dữ liệu N23_2024',
                'time_start'=>'2024-10-03 06:45:00',
                'time_end'=>'2024-10-03 09:30:00',
                'location'=>'A6-402',
            ],
            [
                'course_name'=>'Khai phá dữ liệu N23_2024',
                'time_start'=>'2024-10-11 06:45:00',
                'time_end'=>'2024-10-11 09:30:00',
                'location'=>'A6-402',
            ],
            [
                'course_name'=>'Khai phá dữ liệu N23_2024',
                'time_start'=>'2024-10-18 06:45:00',
                'time_end'=>'2024-10-18 09:30:00',
                'location'=>'A6-402',
            ],
            [
                'course_name'=>'Khai phá dữ liệu N23_2024',
                'time_start'=>'2024-10-25 06:45:00',
                'time_end'=>'2024-10-25 09:30:00',
                'location'=>'A6-402',
            ],
            [
                'course_name'=>'Khai phá dữ liệu N23_2024',
                'time_start'=>'2024-11-02 06:45:00',
                'time_end'=>'2024-11-02 09:30:00',
                'location'=>'A6-402',
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'time_start'=>'2024-10-02 09:30:00',
                'time_end'=>'2024-10-02 12:10:00',
                'location'=>'A7-406',
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'time_start'=>'2024-10-09 09:30:00',
                'time_end'=>'2024-10-09 12:10:00',
                'location'=>'A7-406',
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'time_start'=>'2024-10-16 09:30:00',
                'time_end'=>'2024-10-16 12:10:00',
                'location'=>'A7-406',
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'time_start'=>'2024-10-23 09:30:00',
                'time_end'=>'2024-10-23 12:10:00',
                'location'=>'A7-406',
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'time_start'=>'2024-10-30 09:30:00',
                'time_end'=>'2024-10-30 12:10:00',
                'location'=>'A7-406',
            ],
            [
                'course_name'=>'Xử lý ngôn ngữ tự nhiên N03_2024',
                'time_start'=>'2024-12-01 09:30:00',
                'time_end'=>'2024-12-01 12:10:00',
                'location'=>'A6-203',
            ],
            [
                'course_name'=>'Xử lý ngôn ngữ tự nhiên N03_2024',
                'time_start'=>'2024-12-08 09:30:00',
                'time_end'=>'2024-12-08 12:10:00',
                'location'=>'A6-203',
            ],
            [
                'course_name'=>'Xử lý ngôn ngữ tự nhiên N03_2024',
                'time_start'=>'2024-12-15 09:30:00',
                'time_end'=>'2024-12-15 12:10:00',
                'location'=>'A6-203',
            ],
            [
                'course_name'=>'Xử lý ngôn ngữ tự nhiên N03_2024',
                'time_start'=>'2024-12-23 09:30:00',
                'time_end'=>'2024-12-23 12:10:00',
                'location'=>'A6-203',
            ],
            [
                'course_name'=>'Xử lý ngôn ngữ tự nhiên N03_2024',
                'time_start'=>'2024-12-30 09:30:00',
                'time_end'=>'2024-12-30 12:10:00',
                'location'=>'A6-203',
            ],
            
        ]);
    }
}

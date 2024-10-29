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
                'time_start'=>'06:45',
                'time_end'=>'09:30',
                'day'=>'2024-10-01',
                'location'=>'A6-402',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'time_start'=>'06:45',
                'time_end'=>'09:30',
                'day'=>'2024-10-08',
                'location'=>'A6-402',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'time_start'=>'06:45',
                'time_end'=>'09:30',
                'day'=>'2024-10-15',
                'location'=>'A6-402',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'time_start'=>'06:45',
                'time_end'=>'09:30',
                'day'=>'2024-10-22',
                'location'=>'A6-402',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'course_name'=>'Phân tích và thiết kế phần mềm N02_2024',
                'time_start'=>'06:45',
                'time_end'=>'09:30',
                'day'=>'2024-10-29',
                'location'=>'A6-402',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'time_start'=>'09:30',
                'time_end'=>'12:10',
                'day'=>'2024-10-02',
                'location'=>'A7-406',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'time_start'=>'09:30',
                'time_end'=>'12:10',
                'day'=>'2024-10-09',
                'location'=>'A7-406',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'time_start'=>'09:30',
                'time_end'=>'12:10',
                'day'=>'2024-10-16',
                'location'=>'A7-406',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'time_start'=>'09:30',
                'time_end'=>'12:10',
                'day'=>'2024-10-23',
                'location'=>'A7-406',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'course_name'=>'Kỹ năng giao tiếp bằng tiếng Hàn N11_2024',
                'time_start'=>'09:30',
                'time_end'=>'12:10',
                'day'=>'2024-10-30',
                'location'=>'A7-406',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            
        ]);
    }
}

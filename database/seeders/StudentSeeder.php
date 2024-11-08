<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('students')->insert([
            [
                'student_id'=>'SV01',
                'fullname'=>'Nguyễn Quang Hệ',
                'phonenumber'=>'096171883',
                'email'=>'quanghe2003@gmail.com',
                'department'=>'Công nghệ thông tin',
                'student_id'=>'SV01',
                'year'=>'K15',
            ],
            [
                'fullname'=>'Ninh Duy Hiệp',
                'phonenumber'=>'0352412785',
                'email'=>'duyhiep@gmail.com',
                'department'=>'Công nghệ thông tin',
                'student_id'=>'SV02',
                'year'=>'K15',
            ],
            [
                'fullname'=>'Trần Minh Hiếu',
                'phonenumber'=>'0321458741',
                'email'=>'minhhieu@gmail.com',
                'department'=>'Công nghệ thông tin',
                'student_id'=>'SV03',
                'year'=>'K15',
            ],
            [
                'fullname'=>'Hồ Văn Long',
                'phonenumber'=>'0254784126',
                'email'=>'vanlong@gmail.com',
                'department'=>'Công nghệ thông tin',
                'student_id'=>'SV04',
                'year'=>'K16',
            ],
            [
                'fullname'=>'Trần Phương Thảo',
                'phonenumber'=>'0242587412',
                'email'=>'phuongthao@gmail.com',
                'department'=>'Công nghệ thông tin',
                'student_id'=>'SV05',
                'year'=>'K16',
            ],
            [
                'fullname'=>'Lý Khắc Cường',
                'phonenumber'=>'034458241',
                'email'=>'khaccuong@gmail.com',
                'department'=>'Ngôn ngữ Hàn',
                'student_id'=>'SV06',
                'year'=>'K15',
            ],
            [
                'fullname'=>'Trần Thị Hiền',
                'phonenumber'=>'0341788514',
                'email'=>'thihien@gmail.com',
                'department'=>'Ngôn ngữ Hàn',
                'student_id'=>'SV07',
                'year'=>'K15',
            ],
            [
                'fullname'=>'Hồ Ngọc Anh',
                'phonenumber'=>'0344882604',
                'email'=>'ngocanh@gmail.com',
                'department'=>'Ngôn ngữ Hàn',
                'student_id'=>'SV08',
                'year'=>'K15',
            ],
            [
                'fullname'=>'Nguyễn Hồng Hoa',
                'phonenumber'=>'0344778124',
                'email'=>'honghoa@gmail.com',
                'department'=>'Ngôn ngữ Hàn',
                'student_id'=>'SV09',
                'year'=>'K16',
            ],
            [
                'fullname'=>'Phạm Ngọc Thạch',
                'phonenumber'=>'0344785126',
                'email'=>'ngocThach@gmail.com',
                'department'=>'Ngôn ngữ Hàn',
                'student_id'=>'SV10',
                'year'=>'K15',
            ],
        ]);
    }
}

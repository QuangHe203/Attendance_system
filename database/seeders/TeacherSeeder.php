<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('teachers')->insert([
            [
                'fullname'=>'Mai Thúy Nga',
                'teacher_id'=>'GV01',
                'phonenumber'=>'0354785124',
                'email'=>'thuynga@gmail.com',
                'department'=>'Công nghệ thông tin',
            ],
            [
                'fullname'=>'Hoàng Thị Liên',
                'teacher_id'=>'GV02',
                'phonenumber'=>'095471587',
                'email'=>'thilien@gmail.com',
                'department'=>'Ngôn ngữ Hàn Quốc',
            ],
        ]);
    }
}

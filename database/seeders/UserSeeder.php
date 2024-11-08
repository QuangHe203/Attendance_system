<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'user_id'=>'user01',
                'usename'=>'nguyenquanghe',
                'password'=>'1234abcd',
                'role'=>'student',
                'id_reference'=>'SV01',
                
                
            ],
            [
                'user_id'=>'user02',
                'usename'=>'ninhduyhiep',
                'password'=>'1234abcd',
                'role'=>'student',
                'id_reference'=>'SV02',
                
                
            ],
            [
                'user_id'=>'user03',
                'usename'=>'tranminhhieu',
                'password'=>'1234abcd',
                'role'=>'student',
                'id_reference'=>'SV03',
                
                
            ],
            [
                'user_id'=>'user04',
                'usename'=>'maithuynga',
                'password'=>'1234abcd',
                'role'=>'teacher',
                'id_reference'=>'GV01',
                
                
            ],
            [
                'user_id'=>'user05',
                'usename'=>'hoangthilien',
                'password'=>'1234abcd',
                'role'=>'teacher',
                'id_reference'=>'GV02',
                
                
            ],
            [
                'user_id'=>'user06',
                'usename'=>'admin01',
                'password'=>'1234abcd',
                'role'=>'Admin',
                'id_reference'=>'admin01',
                
                
            ],
            
        ]);
    }
}

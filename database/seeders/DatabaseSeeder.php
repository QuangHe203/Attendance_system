<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            CourseSeeder::class,
            PeriodSeeder::class,
            StudentAttendanceResultSeeder::class,
            StudentListSeeder::class,
            StudentSeeder::class,
            TeacherAttendanceResultSeeder::class,
            TeacherSeeder::class,
            // thêm các seeder khác ở đây
        ]);
    }
}

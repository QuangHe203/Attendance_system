<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('semesters')->insert([
            [
                'semester_name' => 'Kì I 2024-2025 CNTT',
                'time_start' => '2024-10-01 00:00:00',
                'time_end' => '2024-11-30 23:59:59'
            ],
            [
                'semester_name' => 'Kì II 2024-2025 CNTT',
                'time_start' => '2024-12-01 00:00:00',
                'time_end' => '2025-01-30 23:59:59'
            ],
            [
                'semester_name' => 'Kì I 2024-2025 NNHQ',
                'time_start' => '2024-10-01 00:00:00',
                'time_end' => '2024-11-30 23:59:59'
            ],
            [
                'semester_name' => 'Kì II 2024-2025 NNHQ',
                'time_start' => '2024-12-01 00:00:00',
                'time_end' => '2025-01-30 23:59:59'
            ],
        ]);
    }
}

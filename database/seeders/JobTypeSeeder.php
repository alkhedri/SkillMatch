<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\JobType::insert([
        ['name' => 'دوام كامل', 'slug' => 'full_time'],
        ['name' => 'دوام جزئي', 'slug' => 'part_time'],
        ['name' => 'عن بعد', 'slug' => 'remote'],
        ['name' => 'تدريب', 'slug' => 'internship'],
        ['name' => 'مؤقت', 'slug' => 'temporary'],
    ]);
    }
}

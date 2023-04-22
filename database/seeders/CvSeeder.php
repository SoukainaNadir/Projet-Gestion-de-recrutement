<?php

namespace Database\Seeders;

use App\Models\Cv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Cv::factory()->count(10)->create();
    }
}

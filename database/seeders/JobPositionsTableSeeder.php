<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class JobPositionsTableSeeder extends Seeder
{
    public function run()
    {
       

        DB::table('job_positions')->insert([
            [
                'Job_Title' => 'Software Engineer',
                'Job_Description' => 'Responsible for developing and maintaining software applications.',
                'department_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Job_Title' => 'HR Manager',
                'Job_Description' => 'Handles recruitment and employee relations.',
                'department_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Job_Title' => 'Marketing Specialist',
                'Job_Description' => 'Develops and executes marketing strategies.',
                'department_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

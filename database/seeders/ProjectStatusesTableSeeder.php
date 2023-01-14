<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ["name" => "Not Started",'created_at' => now(), 'updated_at' => now()],
            ["name" => "In Progress",'created_at' => now(), 'updated_at' => now()],
            ["name" => "On Hold",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Completed",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Cancelled",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Delayed",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Deferred",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Blocked",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Approved",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Rejected",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Under Review",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Testing",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Deployed",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Implemented",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Maintained",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Archived",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Abandoned",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Dropped",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Resumed",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Upgraded",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Merged",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Integrated",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Consolidated",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Streamlined",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Optimized",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Transferred",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Outsourced",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Automated",'created_at' => now(), 'updated_at' => now()],
            ["name" => "Modernized",'created_at' => now(), 'updated_at' => now()]
        ];

        

        DB::table('project_statuses')->insert($statuses);
    }
}

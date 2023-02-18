<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => 'Electronics', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Software', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mechanical', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('project_categories')->insert($statuses);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $total = 100;

        for ($i = 0; $i < $total; $i++) {
            try {
                Project::factory()->create();
            } catch (\Illuminate\Database\QueryException $ex) {
                // Catch the exception thrown when there is a violation of the integrity constraint
            }
        }
    }
}

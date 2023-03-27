<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Expense;
use App\Models\Income;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Populate countries data from SQL file
        $file_path = resource_path('sql/countries.sql');
        DB::unprepared(
            file_get_contents($file_path)
        );

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
        ]);

        if (App::environment('local')) {
            \App\Models\User::factory(100)->create();
        }

        $this->call([
            ExpenseStatusSeeder::class,
            ExpensecategoriesSeeder::class,
            ProjectStatusesTableSeeder::class,
            ProjectCategoriesSeeder::class,
        ]);

        if (App::environment('local')) {
            $this->call([
                ClientsTableSeeder::class,
                ProjectSeeder::class,
            ]);
            Income::factory()->count(50)->create();
            Expense::factory()->count(50)->create();
        }
    }
}

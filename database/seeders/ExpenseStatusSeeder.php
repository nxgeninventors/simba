<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => 'Pending Approval', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Approved', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rejected', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'In Review', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Paid', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pending Payment', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Processing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cancelled', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'On Hold', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Submitted', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('expense_statuses')->insert($statuses);
    }
}

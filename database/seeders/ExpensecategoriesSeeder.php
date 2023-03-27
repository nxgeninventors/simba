<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpensecategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_path = resource_path('json/expense_categories.json');
        $expense_categories = file_get_contents($file_path);
        $expense_categories = json_decode($expense_categories, true);

        foreach ($expense_categories as $category) {
            $category['created_at'] = now();
            $category['updated_at'] = now();
        }
        DB::table('expense_categories')->insert($expense_categories);
    }
}

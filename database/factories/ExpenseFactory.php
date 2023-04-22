<?php

namespace Database\Factories;

use App\Models\ExpenseStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'expense_status_id' => $this->faker->numberBetween(1, 3), // ExpenseStatus::all()->random()->id,
            'notes' => $this->faker->sentence,
            'expense_category_id' => $this->faker->numberBetween(1, 35),
            'project_id' => $this->faker->numberBetween(1, 10), // User::all()->random()->id,
            'user_id' => $this->faker->numberBetween(1, 10), // User::all()->random()->id,
            'approved_by' => $this->faker->numberBetween(10, 20), // User::all()->random()->id,
            'approver_notes' => $this->faker->sentence,
            'approved_at' => now(),
            'amount' => $this->faker->randomFloat(2, 10, 500),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now')
        ];
    }
}

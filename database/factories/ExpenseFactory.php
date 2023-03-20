<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ExpenseStatus;
use App\Models\User;

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
            'user_id' => $this->faker->numberBetween(1, 10), // User::all()->random()->id,
            'approved_by' => $this->faker->numberBetween(10, 20), // User::all()->random()->id,
            'approver_notes' => $this->faker->sentence,
            'approved_at' => now(),
            'amount' => $this->faker->randomFloat(2, 10, 500),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_name' => fake()->company,
            'address' => fake()->address,
            'contact_number' => fake()->phoneNumber,
            'gst_no' => fake()->numerify('##AABBCC####Q#Z#'),
            'bank_name' => fake()->words(3, true),
            'account_no' => fake()->bankAccountNumber,
            'ifsc_code' => fake()->swiftBicNumber,
        ];
    }
}

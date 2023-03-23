<?php

namespace Database\Factories;

use App\Models\Clients;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clients>
 */
class ClientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Clients::class;

    public function definition()
    {
        return [
            'name' => fake()->name(),
            'website' => fake()->domainName(),
            'industry' => fake()->company(),
            'description' => fake()->paragraph(),
            'country_id' => fake()->numerify('##'),
            'email' => fake()->email(),
            'mobile' => fake()->isbn10(),
            'street_address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'zip' => fake()->postcode(),
        ];
    }
}

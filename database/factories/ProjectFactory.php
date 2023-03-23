<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'project_name' => $this->faker->company(), // sentences(2);
            'project_category_id' => $this->faker->numberBetween(1, 3),
            'project_status_id' => $this->faker->numberBetween(1, 5),
            'client_id' => $this->faker->numberBetween(1, 20),
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}

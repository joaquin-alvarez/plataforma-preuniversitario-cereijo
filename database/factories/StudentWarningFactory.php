<?php

namespace Database\Factories;

use App\Models\Support\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

use function PHPSTORM_META\map;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentWarning>
 */
class StudentWarningFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_of' => fake()->date(max: 'now'),
            'reason' => fake()->text(50),
            'observations' => fake()->randomElement([
                fake()->text(200), null
            ])
        ];
    }
}

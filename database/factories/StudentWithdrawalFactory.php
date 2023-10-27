<?php

namespace Database\Factories;

use App\Models\StudentGuardian;
use App\Models\StudentWithdrawal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentWithdrawal>
 */
class StudentWithdrawalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment' => fake()->randomElement([null, fake()->realText]),
        ];
    }
}

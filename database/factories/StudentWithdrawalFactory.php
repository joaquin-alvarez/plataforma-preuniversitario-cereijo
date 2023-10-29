<?php

namespace Database\Factories;

use App\Models\StudentGuardian;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentWithdrawalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $studentGuardian = StudentGuardian::all()->random();

        return [
            'student_guardian_dni' => $studentGuardian->dni,
            'student_dni' => $studentGuardian->students()->inRandomOrder()->first(['dni']),
            'datetime' => fake()->dateTimeBetween('now', '+1 year'),
            'comment' => fake()->randomElement([null, fake()->realText]),
        ];
    }
}

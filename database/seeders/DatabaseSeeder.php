<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\StudentGuardian;
use App\Models\StudentWithdrawal;
use App\Models\Subject;
use App\Models\Support\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
    * Seed the application's database.
    */
    public function run(): void
    {
        DB::table('gradable_authorizations')->insert([
            ['student_grade_column' => 'period_1_score'],
            ['student_grade_column' => 'period_2_score'],
            ['student_grade_column' => 'period_3_score'],
            ['student_grade_column' => 'extra_exam_1_score'],
            ['student_grade_column' => 'extra_exam_2_score'],
            ['student_grade_column' => 'final_score']
        ]);

        DB::table('roles')->insert([
            ['role' => 'ADMIN'],
            ['role' => 'TEACHER'],
            ['role' => 'STUDENT'],
        ]);

        DB::table('courses')->insert([
            ['course' => '1A'],
            ['course' => '1B'],
            ['course' => '1C'],
            ['course' => '1D'],
            ['course' => '2A'],
            ['course' => '2B'],
            ['course' => '2C'],
            ['course' => '2D'],
            ['course' => '3A'],
            ['course' => '3B'],
            ['course' => '3C'],
            ['course' => '3D'],
            ['course' => '4A'],
            ['course' => '4B'],
            ['course' => '4C'],
            ['course' => '4D'],
            ['course' => '5A'],
            ['course' => '5B'],
            ['course' => '5C'],
            ['course' => '5D'],
            ['course' => '6A'],
            ['course' => '6B'],
            ['course' => '6C'],
            ['course' => '6D'],
        ]);

        $subjects = Subject::factory(144)->state(state: new Sequence(
            ...Course::all(['id'])->pluck('id')->map(function ($id) {
                return ['course_id' => $id];
            })
        ));

        User::factory()->createMany([
            [
                'dni' => 36331327,
                'first_name' => 'Joaquín',
                'last_name' => 'Alvarez',
                'role_id' => Role::ADMIN,
                'password' => Hash::make('123')
            ],
            [
                'dni' => 36331328,
                'first_name' => 'Joaquín',
                'last_name' => 'Alvarez',
                'role_id' => Role::TEACHER,
                'password' => Hash::make('123')
            ],
            [
                'dni' => 36331329,
                'first_name' => 'Joaquín',
                'last_name' => 'Alvarez',
                'role_id' => Role::STUDENT,
                'password' => Hash::make('123')
            ],
        ]);

        User::factory(6)->create([
            'role_id' => Role::ADMIN,
        ]);

        User::factory(60)->create([
            'role_id' => Role::TEACHER,
        ]);

        $subjects->state(state: new Sequence(
        ...User::where('role_id', Role::TEACHER)->pluck('dni')->map(function ($dni) {
            return ['teacher_dni' => $dni];
        })
        ))->create();

        User::factory(480)->state(new Sequence(
            ...Course::all(['id'])->pluck('id')->map(function ($id) {
                return [
                    'course_id' => $id,
                    'role_id' => Role::STUDENT,
                ];
            })
        ))->has(StudentGuardian::factory(2))
        ->create();

        StudentWithdrawal::factory(800)->create();
    }
}

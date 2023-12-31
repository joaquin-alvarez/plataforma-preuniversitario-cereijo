<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Announcement;
use App\Models\Course;
use App\Models\GradablePeriod;
use App\Models\Post;
use App\Models\StudentGuardian;
use App\Models\StudentWarning;
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

        GradablePeriod::factory()->createMany([
            ['period' => 'first_quarter'],
            ['period' => 'second_quarter'],
            ['period' => 'third_quarter'],
            ['period' => 'first_extra'],
            ['period' => 'second_extra'],
            ['period' => 'final'],
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
                'password' => Hash::make('123'),
            ],
            [
                'dni' => 36331328,
                'first_name' => 'Joaquín',
                'last_name' => 'Alvarez',
                'role_id' => Role::TEACHER,
                'password' => Hash::make('123'),
            ],
            [
                'dni' => 36331329,
                'first_name' => 'Joaquín',
                'last_name' => 'Alvarez',
                'role_id' => Role::STUDENT,
                'password' => Hash::make('123'),
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

        $courses = Course::all();
        Announcement::factory(3)->hasAttached($courses)->create();
        Announcement::factory(2)->hasAttached($courses->whereIn('id', [1, 2, 5]))->create();

        foreach (Subject::all() as $subject) {
            Post::factory(3)->create([
                'subject_id' => $subject->id,
                'user_dni' => $subject->teacher->dni,
            ]);
        }

        foreach (User::ofRole(Role::STUDENT)->get()->random(400) as $student) {
            StudentWarning::factory()
            ->count(3)
            ->for($student, 'student')
            ->create();
        };
    }
}

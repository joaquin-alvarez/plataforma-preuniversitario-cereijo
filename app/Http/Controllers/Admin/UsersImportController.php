<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Support\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelReader;

class UsersImportController extends Controller
{
    public function excel(Request $request)
    {
        $courses = Course::all(['id', 'course']);

        SimpleExcelReader::create($request->file, 'xlsx')
            ->getRows()
            ->each(function (array $rowProperties) use ($courses) {
                $courseID = $courses->firstWhere('course', $rowProperties['curso'])->id;

                User::firstOrCreate(
                    [
                        'dni' => $rowProperties['dni']
                    ],
                    [
                        'course_id' => $courseID, 
                        'role_id' => Role::STUDENT, 
                        'first_name' => $rowProperties['nombre'], 
                        'last_name' => $rowProperties['apellido'], 
                        'password' => $rowProperties['password']
                    ]
                );
            });
    }
}

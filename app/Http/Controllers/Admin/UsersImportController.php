<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Support\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\SimpleExcel\SimpleExcelReader;
use Spatie\SimpleExcel\SimpleExcelWriter;

class UsersImportController extends Controller
{
    public function excel(Request $request)
    {//TODO : not done
        $courses = Course::all(['id', 'course']);

        SimpleExcelReader::create($request->file, 'xlsx')
            ->getRows()
            ->each(function (array $rowProperties, $courses) {
                User::firstOrCreate([
                    ['dni' => $rowProperties['dni']],
                    ['course_id' => $courses->where('course', $rowProperties['dni'])],
                ]);
            });
    }
}

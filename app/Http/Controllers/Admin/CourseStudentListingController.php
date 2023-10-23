<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseStudentListingController extends Controller
{
    public function create (Course $course)
    {
        return view('admin.student-listing', [
            'course' => $course->course,
            'students' => $course->students,
        ]);
    }
}

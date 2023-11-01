<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseSubjectListingController extends Controller
{
    public function create(Course $course)
    {
        return view('admin.subject-listing', [
            'course' => $course->course,
            'subjects' => $course->subjects->load(['teacher']),
        ]);
    }
}

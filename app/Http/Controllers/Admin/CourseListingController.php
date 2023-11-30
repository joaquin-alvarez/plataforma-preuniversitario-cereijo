<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseListingController extends Controller
{
    public function create()
    {
        return view('admin.course-listing', [
            'courses' => Course::all(),
        ]);
    }
}

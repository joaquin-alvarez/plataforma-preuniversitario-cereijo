<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Request;

class CourseManagementController extends Controller
{
    public function create(Course $course)
    {
        return $course->load(['students']);
    }

    public function update(Request $request) {
        // TODO complete request
    }
}

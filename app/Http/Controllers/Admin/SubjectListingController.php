<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;

class SubjectListingController extends Controller
{
    public function create()
    {
        return view('admin.subject-listing', [
            'subjects' => Subject::all(),
        ]);
    }
}

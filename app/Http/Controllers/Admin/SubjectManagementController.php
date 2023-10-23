<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectManagementController extends Controller
{
    public function create(Subject $subject)
    {
        return $subject;
    }

    public function update(Request $request, Subject $subject)
    {

    }
}

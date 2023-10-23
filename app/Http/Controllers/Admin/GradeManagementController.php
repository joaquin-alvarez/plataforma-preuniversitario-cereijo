<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GradingAuthorization;
use Illuminate\Http\Request;

class GradeManagementController extends Controller
{
    public function create()
    {
        return view('admin.grading-authorization', [
            'states' => GradingAuthorization::all()
        ]);
    }

    public function update (Request $request)
    {
        return $request;
    }
}

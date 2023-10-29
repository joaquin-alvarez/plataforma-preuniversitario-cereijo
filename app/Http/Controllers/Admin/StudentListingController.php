<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support\Role;
use App\Models\User;
use Illuminate\Http\Request;

class StudentListingController extends Controller
{
    public function create()
    {
        return view('admin.student-listing', [
            'students' => User::where('role_id', Role::STUDENT)->get(['dni']),
        ]);
    }
}

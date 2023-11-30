<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function create(): View
    {
        return view('teacher.dashboard', [

        ]);
    }
}

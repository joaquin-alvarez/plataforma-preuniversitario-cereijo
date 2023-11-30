<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GradablePeriod;
use App\Models\GradablePeriodState;
use App\Models\Support\Role;
use App\Models\User;

class DashboardController extends Controller
{
    public function create()
    {
        //TESTING
        return view('admin.dashboard', [
            'users' => User::all(),
            'students' => User::with('studentAbsenceReports')->where('role_id', Role::STUDENT)->oldest()->get()->take(10),
            'periods' => GradablePeriod::all(),
            'active_period' => GradablePeriodState::active()->get(),
        ]);
    }
}

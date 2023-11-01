<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function create()
    {
        return view('admin.dashboard', [
            'states' => DB::table('gradable_authorizations')->get(),
            'students' => User::where('role_id', Role::STUDENT)->get(), //TESTING
        ]);
    }
}

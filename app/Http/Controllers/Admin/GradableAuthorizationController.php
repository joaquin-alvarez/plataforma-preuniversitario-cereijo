<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradableAuthorizationController extends Controller
{
    //TODO: Update to AJAX version
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'states' => 'required|array',
            'states.*' => 'required|in:0,1',
        ]);

        $states = $request->input('states');

        DB::transaction(function () use ($states) {
            foreach($states as $key => $item) {
                DB::table('gradable_authorizations')
                    ->where('student_grade_column', $key)
                    ->update(['state' => $item]);
            }
        });

        return redirect( route('admin.dashboard') );
    }
}

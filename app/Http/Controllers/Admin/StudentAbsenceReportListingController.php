<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentAbsenceReport;
use App\Models\User;
use Illuminate\Http\Request;

class StudentAbsenceReportListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(route('admin.dashboard'), [
           'all_student_absence_reports' => StudentAbsenceReport::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view(route('admin.dashboard'), [
            'student_absence_reports' => StudentAbsenceReport::where('student_dni', $user->dni)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentAbsenceReport $studentAbsenceReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentAbsenceReport $studentAbsenceReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentAbsenceReport $studentAbsenceReport)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentAbsenceReport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StudentAbsenceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return StudentAbsenceReport::all();
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'student_dni' => 'required|numeric',
            'date_of_absence' => 'required|date',
            'comment' => 'max:200',
            'is_justified' => 'required|in:0,1',
        ]);

        StudentAbsenceReport::create([
            'student_dni' => $request->student_dni,
            'date_of_absence' => $request->date_of_absence,
            'comment' => $request->comment,
            'is_justified' => $request->is_justified,
        ]);

        return redirect(route('admin.dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentAbsenceReport $studentAbsenceReport)
    {
        return redirect(route('admin.dashboard'), [
            'student_absence_report' => $studentAbsenceReport,
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
        $request->validate([
            'date_of_absence' => 'required|date',
            'comment' => 'max:200',
            'is_justified' => 'required|in:0,1',
        ]);

        $studentAbsenceReport->update([
            'date_of_absence' => $request->date_of_absence,
            'comment' => $request->comment,
            'is_justified' => $request->is_justified,
        ]);

        return redirect(route('admin.dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentAbsenceReport $studentAbsenceReport): RedirectResponse
    {
        StudentAbsenceReport::destroy($studentAbsenceReport);

        return redirect(route('admin.dashboard'));
    }
}

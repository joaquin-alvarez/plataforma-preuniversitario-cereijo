<?php

namespace App\Http\Controllers\Storage;

use App\Http\Controllers\Controller;
use App\Models\Storage\StudentGradesReport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentGradesReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'student_dni' => 'required|numeric',
            'file' => 'required|file',
        ]);

        $path = $request->file('file')->store('student-grades-reports');

        StudentGradesReport::updateOrcreate(
            ['student_dni' => $request->student_dni],
            ['student_dni' => $request->student_dni, 'path' => $path],
        );

        return redirect(route('admin.dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentGradesReport $studentGradesReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentGradesReport $studentGradesReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentGradesReport $studentGradesReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentGradesReport $studentGradesReport)
    {
        //
    }
}

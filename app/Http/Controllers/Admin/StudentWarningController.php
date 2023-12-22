<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentWarning;
use App\Models\Support\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class StudentWarningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.student-warning');
    }

    public function search(Request $request)
    {
        $students = User::ofRole(Role::STUDENT)
            ->where('dni', 'like', '%'.$request->search.'%')->get();

        return view('admin.student-warning', [
            'students'=> $students,
        ])
        ->fragmentsIf($request->hasHeader('HX-Request'), ['result-list']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.student-warning');
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
    public function show(StudentWarning $studentWarning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentWarning $studentWarning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentWarning $studentWarning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentWarning $studentWarning)
    {
        //
    }
}

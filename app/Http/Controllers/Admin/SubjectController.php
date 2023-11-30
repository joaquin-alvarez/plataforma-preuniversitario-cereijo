<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Support\Role;
use App\Models\User;
use Illuminate\Http\Request;

class SubjectController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        $teachers = User::ofRole(Role::TEACHER)->get();

        return view ('admin.subject-edit', [
            'subject' => $subject->load('teacher'),
            'teachers' => $teachers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $validatedData = $request->validate([
            'teacher_dni' => 'required|exists:users,dni|numeric',
        ]);

        if ($validatedData) {
           $subject->teacher_dni = $validatedData['teacher_dni'];
           $subject->save();
           return redirect( route('admin.subject_management.create') )->with('success', 'Cambios guardados con éxito');
        }

        return back()->withErrors([
            'teacher' => "Docente inexistente",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentWarning;
use App\Models\User;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentWarningController extends Controller
{
    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService; 
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.student-warning');
    }

    public function search(Request $request)
    {
        $results = $this->searchService
            ->searchStudentsWithCountedWarnings($request->search);

        return view('admin.student-warning', [
            'students'=> $results,
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

    public function show(User $user)
    {
        return view('admin.student-warnings', [
            'student' => $user->load('studentWarnings')
        ]);
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentWarning;
use App\Services\SearchService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class StudentWarningController extends Controller
{
    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService; 
    }

    public function index (Request $request) : Response
    {
        $results = collect([]);

        if ($request->query('search')) {
            $results = $this->searchService
                ->searchStudentsWarnings($request->query('search'));
        }

        return response(view('admin.student-warning', [
            'warnings'=> $results,
        ])
        ->fragmentIf($request->hasHeader('HX-Request'), 'result-list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.student-warning-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'comments' => ['string', 'nullable', 'max:600'],
            'date_of' => ['required', 'before_or_equal:"now"'],
            'reason' => ['string', 'required', 'max:600'],
        ]);

        return to_route('admin.student_warnings');
    }

    public function show(StudentWarning $warning)
    {

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

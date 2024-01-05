<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support\Role;
use App\Models\User;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserSearchController extends Controller
{
    private static $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function findStudent(Request $request) : Response
    {
        $validated = $request->validate([
            $request->search => 'numeric|required'
        ]);

        return view('admin.student-warning-create', [
            'result' => $this->searchService->findStudent($validated->search)
        ])
        ->fragment('search-result');
    }
}

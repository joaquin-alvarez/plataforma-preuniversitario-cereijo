<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GradablePeriodState;
use Illuminate\Http\Request;

class GradablePeriodStateController extends Controller
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
        $request->validate([
            'period' => 'required|numeric',
            'active_from' => 'required|date',
            'active_until' => 'required|date'
        ]);

        $gradablePeriodState = new GradablePeriodState([
            'gradable_period_id' => $request->period,
            'active_from' => $request->active_from,
            'active_until' => $request->active_until,
        ]);
        
        $gradablePeriodState->save();

        return redirect(route('admin.dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(GradablePeriodState $gradablePeriodState)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GradablePeriodState $gradablePeriodState)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GradablePeriodState $gradablePeriodState)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GradablePeriodState $gradablePeriodState)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowScheduleRequest;
use App\Http\Requests\StoreScheduleRequest;
use App\Models\Day;
use App\Models\Group;
use App\Models\Schedule;
use App\Models\Substitution;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        $groups = Group::all();

        return view('schedule.index', [
            'schedules' => $schedules,
            'groups' => $groups,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleRequest $request)
    {
        Schedule::create($request->validated());

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowScheduleRequest $request)
    {
        $days = Day::all();

        $substitutions = Substitution::where('group_id', '=', $request->group_id)
            ->where('date', '>=', Carbon::now()->toDateString())
            ->where('date', '<', Carbon::now()->addWeek()->toDateString())
            ->with('day', 'subject', 'teacher', 'order', 'audience')
            ->get()
            ->sortBy('order_id');

        $schedules = Schedule::where('group_id', '=', $request->group_id)
            ->with('day', 'subject', 'teacher', 'order', 'audience')
            ->get()
            ->sortBy('order_id');

        return view('schedule.show', [
            'days' => $days,
            'schedules' => $schedules,
            'substitutions' => $substitutions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}

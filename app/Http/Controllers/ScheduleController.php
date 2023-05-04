<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowScheduleRequest;
use App\Http\Requests\StoreScheduleRequest;
use App\Models\Course;
use App\Models\Day;
use App\Models\Department;
use App\Models\Group;
use App\Models\Schedule;
use App\Models\Substitution;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        $courses = Course::all();
        $departments = Department::all();

        return view('schedule.index', [
            'groups' => $groups,
            'courses' => $courses,
            'departments' => $departments,
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
            ->where('course_id', '=', $request->course_id)
            ->where('department_id', '=', $request->department_id)
            ->where('date', '>=', Carbon::now()->toDateString())
            ->where('date', '<', Carbon::now()->addWeek()->toDateString())
            ->with('day', 'subject', 'teacher', 'order', 'audience', 'department', 'course')
            ->get()
            ->sortBy('order_id');

        $schedules = Schedule::where('group_id', '=', $request->group_id)
            ->where('course_id', '=', $request->course_id)
            ->where('department_id', '=', $request->department_id)
            ->with('day', 'subject', 'teacher', 'order', 'audience', 'department', 'course')
            ->get()
            ->sortBy('order_id');

        if ($schedules->count() === 0) {
            return abort(403, 'РАСПИСАНИЕ ДЛЯ ДАННОЙ ГРУППЫ ОТСУТСТВУЕТ');
        }

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

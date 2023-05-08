<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowScheduleRequest;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Audience;
use App\Models\Course;
use App\Models\Day;
use App\Models\Department;
use App\Models\Group;
use App\Models\Order;
use App\Models\Part;
use App\Models\Schedule;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Substitution;
use App\Models\Teacher;
use Carbon\Carbon;

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
        $semesters = Semester::all();

        return view('schedule.index', [
            'groups' => $groups,
            'courses' => $courses,
            'departments' => $departments,
            'semesters' => $semesters,
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
            ->where('semester_id', '=', $request->semester_id)
            ->with('day', 'subject', 'teacher', 'order', 'audience', 'department', 'course', 'semester')
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
        $orders = Order::all();
        $groups = Group::all();
        $subjects = Subject::all();
        $audiences = Audience::all();
        $teachers = Teacher::all();
        $days = Day::all();
        $courses = Course::all();
        $departments = Department::all();
        $parts = Part::all();
        $semesters = Semester::all();

        return view('schedule.edit', [
            'schedule' => $schedule,
            'orders' => $orders,
            'groups' => $groups,
            'courses' => $courses,
            'departments' => $departments,
            'subjects' => $subjects,
            'audiences' => $audiences,
            'teachers' => $teachers,
            'days' => $days,
            'parts' => $parts,
            'semesters' => $semesters,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        $formFields = $request->validated();

        $schedule->update($formFields);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return back();
    }
}

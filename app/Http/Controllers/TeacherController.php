<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Models\Day;
use App\Models\Schedule;
use App\Models\Substitution;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        Teacher::create($request->validated());

        return back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        $schedules = Schedule::where('teacher_id', '=', $teacher->id)
            ->with('department', 'course', 'group', 'day', 'subject', 'audience', 'order', 'part', 'semester')
            ->get();

        $substitutions = Substitution::where('teacher_id', '=', $teacher->id)
            ->where('date', '>=', Carbon::now()->toDateString())
            ->where('date', '<', Carbon::now()->addWeek()->toDateString())
            ->with('department', 'course', 'group', 'day', 'subject', 'audience', 'order')
            ->get();

        $days = Day::all();

        return view('teachers.show', [
            'teacher' => $teacher,
            'schedules' => $schedules,
            'substitutions' => $substitutions,
            'days' => $days,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}

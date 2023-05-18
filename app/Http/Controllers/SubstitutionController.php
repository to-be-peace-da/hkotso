<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubstitutionRequest;
use App\Http\Requests\UpdateSubstitutionRequest;
use App\Models\Audience;
use App\Models\Course;
use App\Models\Department;
use App\Models\Group;
use App\Models\Order;
use App\Models\Subject;
use App\Models\Substitution;
use App\Models\Teacher;

class SubstitutionController extends Controller
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
    public function store(StoreSubstitutionRequest $request)
    {
        Substitution::create($request->validated());

        return back()->with('message', 'Замена добавлена');
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
    public function show(Substitution $substitution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Substitution $substitution)
    {
        $orders = Order::all();
        $groups = Group::all();
        $subjects = Subject::all();
        $audiences = Audience::all();
        $teachers = Teacher::all();
        $courses = Course::all();
        $departments = Department::all();

        return view('substitution.edit', [
            'substitution' => $substitution,
            'orders' => $orders,
            'groups' => $groups,
            'courses' => $courses,
            'departments' => $departments,
            'subjects' => $subjects,
            'audiences' => $audiences,
            'teachers' => $teachers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubstitutionRequest $request, Substitution $substitution)
    {
        $substitution->update($request->validated());

        return back()->with('message', 'Замена изменена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Substitution $substitution)
    {
        $substitution->delete();

        return back()->with('message', 'Замена удалена');
    }
}

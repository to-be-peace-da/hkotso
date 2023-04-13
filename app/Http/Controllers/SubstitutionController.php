<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubstitutionRequest;
use App\Models\Substitution;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubstitutionRequest $request)
    {
        Substitution::create($request->validated());

        return back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Substitution $substitution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Substitution $substitution)
    {
        //
    }
}

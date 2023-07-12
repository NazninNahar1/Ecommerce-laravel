<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepertmentRequest;
use App\Http\Requests\UpdateDepertmentRequest;
use App\Models\Model\Department;
use App\Http\Resources\Department\DepartmentCollection;

class DepertmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DepartmentCollection ::collection(Department::all());
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
    public function store(StoreDepertmentRequest $request)

    {

    $depertment = new Department();
    $depertment->dept_name = $request->dept_name;
    $depertment->save();


    return response()->json(['data' => $depertment]);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $depertment)

    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $depertment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepertmentRequest $request, Department $depertment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $depertment)
    {
        //
    }
}

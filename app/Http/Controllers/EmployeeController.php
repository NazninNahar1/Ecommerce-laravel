<?php

namespace App\Http\Controllers;

use App\Enums\Gender;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Model\Employee;

use Exception;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Employee::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function store(StoreEmployeeRequest $request)
    {

        try {
            $request->validate([
                'emp_nr' => 'required|string',
                'emp_name' => 'required|string',
                'emp_user_name' => 'required|string',
                'emp_company' => 'required|string',
                'password' => 'string',
                'email' => 'nullable|email|unique:employees,email',
                'comment' => 'string',
                'weekly_hours' => 'numeric',
                'contraction' => 'string',
                'nfc_chip_number' => 'string',
                'is_active' => 'boolean',
                'is_leanVisu' => 'boolean',
                'is_supervisor_flag' => 'boolean',
                'entry' => 'nullable|date',
                'exit' => 'nullable|date',
                'date_of_birth' => 'nullable|date',
                'supervisor_name' => 'string',
                'ages' => 'string',
                'emp_art' => 'string',
                'area' => 'string',
                'department_ma' => 'string',
                'hall_nr' => 'string',
                'assigned_role' => 'string',
                'machine_group' => 'string',
                'gender' => 'required|string',
            ]);



            if (!in_array($request->gender, Gender::toValues())) {
                return response()->json(['error' => 'Invalid Gender type.'], 422);
            }


            $employee = new Employee();
            $employee->emp_nr = $request->input('emp_nr');
            $employee->emp_name = $request->input('emp_name');
            $employee->emp_user_name = $request->input('emp_user_name');
            $employee->emp_company = $request->input('emp_company');

            $employee->password = $request->input('password');
            $employee->email = $request->input('email');
            $employee->comment = $request->input('comment');
            $employee->weekly_hours = $request->input('weekly_hours');
            $employee->contraction = $request->input('contraction');
            $employee->nfc_chip_number = $request->input('nfc_chip_number');
            $employee->is_active = $request->input('is_active', false);
            $employee->is_leanVisu = $request->input('is_leanVisu', false);
            $employee->is_supervisor_flag = $request->input('is_supervisor_flag', false);

            $employee->entry = $request->input('entry');
            $employee->exit = $request->input('exit');
            $employee->date_of_birth = $request->input('date_of_birth');
            $employee->supervisor_name = $request->input('supervisor_name');
            $employee->ages = $request->input('ages');
            $employee->emp_art = $request->input('emp_art');
            $employee->area = $request->input('area');

            $employee->department_ma = $request->input('department_ma');
            $employee->hall_nr = $request->input('hall_nr');
            $employee->assigned_role = $request->input('assigned_role');
            $employee->machine_group = $request->input('machine_group');
            $employee->gender = $request->input('gender');
            $employee->save();
        } catch (Exception $exception) {
            dd($exception);
        }

        return response()->json([
            'message' => 'Emplyee Added',
            'status' => 'success',
            'data' => $employee
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {

       

        try {
            $employee->emp_nr = $request->input('emp_nr');
            $employee->emp_name = $request->input('emp_name');
            $employee->emp_user_name = $request->input('emp_user_name');
            $employee->emp_company = $request->input('emp_company');

            $employee->password = $request->input('password');



            $employee->email = $request->input('email');
            $employee->comment = $request->input('comment');
            $employee->weekly_hours = $request->input('weekly_hours');
            $employee->contraction = $request->input('contraction');
            $employee->nfc_chip_number = $request->input('nfc_chip_number');
            $employee->is_active = $request->input('is_active', false);
            $employee->is_leanVisu = $request->input('is_leanVisu', false);
            $employee->is_supervisor_flag = $request->input('is_supervisor_flag', false);

            $employee->entry = $request->input('entry');
            $employee->exit = $request->input('exit');
            $employee->date_of_birth = $request->input('date_of_birth');
            $employee->supervisor_name = $request->input('supervisor_name');
            $employee->ages = $request->input('ages');
            $employee->emp_art = $request->input('emp_art');
            $employee->area = $request->input('area');

            $employee->department_ma = $request->input('department_ma');
            $employee->hall_nr = $request->input('hall_nr');
            $employee->assigned_role = $request->input('assigned_role');
            $employee->machine_group = $request->input('machine_group');
            $employee->gender = $request->input('gender');
            $employee->save();
        } catch (Exception $exception) {
            dd($exception);
        }

        return response()->json([
            'message' => 'EmplyeeInformation Updated',
            'status' => 'success',
            'data' => $employee
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json([
            'message' => 'Successfully deleted Selected Employee!'
        ]);
    }
}

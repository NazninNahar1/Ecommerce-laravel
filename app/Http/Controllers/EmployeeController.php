<?php

namespace App\Http\Controllers;

use App\Enums\Gender;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Model\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Exception;
use Ramsey\Uuid\Type\Integer;

class EmployeeController extends Controller
{

    public function index()
    {
        return Employee::all();
    }


    public function create()
    {
        //
    }


    public function store(StoreEmployeeRequest $request)
    {

        try {



            if (!in_array($request->gender, Gender::toValues())) {
                return response()->json(['error' => 'Invalid Gender type.'], 422);
            }


            $employee = new Employee();
            $employee->emp_nr = $request->input('emp_nr');
            $employee->emp_name = $request->input('emp_name');
            $employee->emp_user_name = $request->input('emp_user_name');
            $employee->emp_company = $request->input('emp_company');
            $employee->department_id = $request->input('department_id');

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
        $employees = Employee::select ('emp_company')
        ->get();

        return response()->json([
            'message' => 'EmplyeeInformation Updated',
            'status' => 'success',
            'data' => $employees
        ]);
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
            $employee->update();
        } catch (Exception $exception) {
            dd($exception);
        }

        return response()->json([
            'message' => 'EmplyeeInformation Updated',
            'status' => 'success',
            'data' => $employee
        ]);
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json([
            'message' => 'Successfully deleted Selected Employee!'
        ]);
    }
    public function search(Request $request)
    {
        // dd("Hello");

        try {

            // print_r($request->company);
            // exit(1);

            $query = $request->company;


            $employees = Employee::where('emp_company', 'like', "%$query%")
                ->get();
            $count = $employees->count();

            return response()->json([
                'items' => $employees,
                'query' => $query,
                'count' => $count,

            ]);
        } catch (\Throwable $th) {
            Log::error($th);
            throw $th;
        }
    }
}

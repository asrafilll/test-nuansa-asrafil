<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getAllEmployees(){
        $employees = Employee::all();
        return response()->json($employees, 200);
    }
    
    public function createNewEmployee(Request $request){

        $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'address' => 'required|string',
        ]);
        
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->age = $request->age;
        $employee->address = $request->address;
        $employee->save();

        return response()->json(['message' => 'Employee created successfully', 'employee' => $employee], 201);
    }
}
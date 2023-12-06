<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CitizenController extends Controller
{

    public function getAllCitizens()
    {
        $citizens = Citizen::all();
        return response()->json($citizens);
    }


    public function addCitizen(Request $request)
    {
    
        $this->validate($request, [
            'Id_prop' => 'required|integer',
            'nik' => 'required|string|unique:citizens,nik', 
            'nama' => 'required|string',
        ]);
        
        $citizen = new Citizen();
        $citizen->Id_prop = $request->Id_prop;
        $citizen->nik = $request->nik;
        $citizen->nama = $request->nama;
        $citizen->save();

        return response()->json(['message' => 'Citizen added successfully', 'citizen' => $citizen], 201);
    }

    public function updateCitizen(Request $request, $id)
    {
        
        $this->validate($request, [
            'Id_prop' => 'required|integer',
            'nik' => [
                'required',
                'string',
                Rule::unique('citizens')->ignore($id), 
            ],
            'nama' => 'required|string',
        ]);

        $citizen = Citizen::find($id);
        $citizen->Id_prop = $request->Id_prop;
        $citizen->nik = $request->nik;
        $citizen->nama = $request->nama;
        $citizen->save();

        return response()->json(['message' => 'Citizen updated successfully', 'citizen' => $citizen], 200);
    }

    public function deleteCitizen($id)
    {
    
        Citizen::find($id)->delete();

        return response()->json(['message' => 'Citizen deleted successfully'], 200);
    }

}

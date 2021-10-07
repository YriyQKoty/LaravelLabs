<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

use App\Models\Recipe;

class PatientsController extends Controller
{
    public function patients() {
        $patients = Patient::all()->sortBy('id');

        return view("patients/index", [
            'patients' => $patients
        ]);

    }

    public function create() {
        return view("patients/create");
    }

    public function store() {

        Patient::create([
            'fullname' => request("fullname"),
            'doctor' => request("doctorName")
        ]);

        return redirect("/patients/index");
    }

    public function edit($id) {
        $patient = Patient::findOrFail($id);

        return view("patients/edit", [
            "patient" => $patient,
        ]);
    }

    public function update($id) {
        $patient = Patient::find($id);

        $patient->fullname = request("fullname");
        $patient->doctor = request("doctorName");

        $patient->save();

        return redirect("patients/index");
    }

    public function destroy($id) {
        $patient = Patient::find($id);

        $patient->delete();
        return redirect("patients/index");
    }

    public function patientsJson() {
        return Patient::all();
    }

}

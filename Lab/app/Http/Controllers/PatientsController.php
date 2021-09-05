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

    public function patientsJson() {
        return Patient::all();
    }

    public function showPatientRecipes($id) {
        $patient = Patient::where('id', $id)->first();
    
        return view("patients/recipes", [
           'doctorName'=> $patient->doctor,
           'title' => 'Patient:' . $patient->fullname,
           'app_title' => $patient->fullname,
           'recipes' => Recipe::all()->where('patient_id', $id),
        ]);
    }
}

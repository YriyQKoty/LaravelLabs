<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Model\Rules;

use DB;

use App\Models\Recipe;

class PatientsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    
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
        
        $data = RulesController::onValidate(RulesController::getRules()['patientRules']);

        Patient::create([
            'fullname' => $data['fullname'],
            'doctor' => $data['doctor']
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

        $data = RulesController::onValidate(RulesController::getRules()['patientRules']);

        $patient->fullname = $data['fullname'];
        $patient->doctor =  $data['doctor'];

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

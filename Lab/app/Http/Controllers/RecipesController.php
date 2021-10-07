<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Patient;

use App\Models\Recipe;

class RecipesController extends Controller
{
    
    public function create($id) {
        return view("recipes/create", [
            'patient_id' => $id,
        ]);
    }

    public function store() {
        $pat_id = Route::current()->parameter('id');
        Recipe::create([
            'description' => request("desc"),
            'type' => request("type"),
            'amount' => request("amount"),
            'patient_id' => $pat_id,
        ]);

        return redirect("/recipes/$pat_id");
    }

    public function edit($id) {
    
    }

    public function update($id) {
      
    }

    public function destroy($id) {
       
    }


    public function showPatientRecipes($id) {
        $patient = Patient::where('id', $id)->first();
    
        return view("recipes/recipes", [
           'doctorName'=> $patient->doctor,
           'title' => 'Patient:' . $patient->fullname,
           'app_title' => $patient->fullname,
           'recipes' => Recipe::all()->where('patient_id', $id),
           'patient_id' => $id
        ]);
    }
}

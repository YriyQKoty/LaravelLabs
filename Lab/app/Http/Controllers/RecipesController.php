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

        $data = RulesController::onValidate(RulesController::getRules()['recipeRules']);

        Recipe::create([
            'description' => $data['description'],
            'type' => $data['type'],
            'amount' => $data['amount'],
            'patient_id' => $pat_id,
        ]);

        return redirect("/recipes/$pat_id");
    }

    public function edit($id) {
        $recipe = Recipe::findOrFail($id);

        return view("recipes/edit", [
            'recipe' => $recipe,
        ]);
    }

    public function update($id) {
        $recipe = Recipe::find($id);

        $data = RulesController::onValidate(RulesController::getRules()['recipeRules']);

        $recipe->description = $data['description'];
        $recipe->type = $data['type'];
        $recipe->amount = $data['amount'];

        $recipe->save();

        return redirect("/recipes/$recipe->patient_id");
    }

    public function destroy($id) {
        $recipe = Recipe::find($id);

        $pat_id = $recipe->patient_id;

        $recipe->delete();
        return redirect("/recipes/$pat_id");
    }


    public function showPatientRecipes($id) {
      
        $patient = Patient::where('id', $id)->first();
    
        return view("recipes/recipes", [
           'doctor'=> $patient->doctor,
           'title' => 'Patient:' . $patient->fullname,
           'app_title' => $patient->fullname,
           'recipes' => Recipe::all()->where('patient_id', $id),
           'patient_id' => $id
        ]);
    }
}

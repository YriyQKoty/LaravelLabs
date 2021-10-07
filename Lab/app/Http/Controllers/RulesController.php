<?php

namespace App\Http\Controllers;

class RulesController extends Controller {

    protected static $rules = [
        'patientRules' => [
            'fields' => [
                'fullname' => 'required|max:100|min:3',
                'doctor' => 'required|max:100|min:3',
            ],
            'rules' => [
                'fullname.required' => 'Fullname cannot be empty!',
                'fullname.max' => 'Fullname must be less than 100 chars!',
                'fullname.min' => 'Fullname must be greater than 3 chars!',

                'doctor.required' => 'Doctor name cannot be empty!',
                'doctor.max' => 'Doctor name must be less than 100 chars!',
                'doctor.min' => 'Doctor name must be greater than 3 chars!',
            ]
        ],
        'recipeRules' => [
            'fields' => [
                'description' => 'required|max:100|min:3',
                'type' => 'required|max:100|min:3',
                'amount' => 'required|min:1',
            ],
            'rules' => [
                'description.required' => 'Description cannot be empty!',
                'description.max' => 'Description  must be less than 100 chars!',
                'description.min' => 'Description  must be greater than 3 chars!',

                'type.required' => 'Medicine type cannot be empty!',
                'type.max' => 'Medicine type must be less than 100 chars!',
                'type.min' => 'Medicine type must be greater than 3 chars!',

                'amount.required' => 'Amount cannot be empty!',
                'amount.min' => 'Amount must be greater than 0!',
            ]
        ]

    ];

    public static function getRules() {

        return RulesController::$rules;
    }

    public static function onValidate(Array $rules) {
        return request()->validate($rules['fields'], $rules['rules']);
    }
}
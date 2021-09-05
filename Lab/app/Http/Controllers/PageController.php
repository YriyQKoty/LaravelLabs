<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Recipe;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home () {
        return view('home');
    }

    public function about() {
        return view('about');
    }

    public function patients() {
        $patients = [
            new Patient('Otto Strauss', 'Gans Obert', [
                new Recipe("Morhin", 1, "Painkiller"),
                new Recipe("Gematovit", 2, "Vitamin")
            ]),
            new Patient('Lubart Boose', 'Derek Sheider', [
                new Recipe("Analgin", 4, "Painkiller"),
                new Recipe("Nasal", 1, "Profilactics")
            ]),
            new Patient('Chan Li', 'Derek Sheider', [
                new Recipe("Nasal", 1, "Profilactics")
            ]),
        ];

        return view("patients", [
            'patients' => $patients
        ]);

    }
}

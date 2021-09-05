<?php

namespace App\Http\Controllers;

use App\Models\Patient;
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
            new Patient('Otto Strauss', 'Gans Obert'),
            new Patient('Lubart Boose', 'Derek Sheider'),
            new Patient('Chan Li', 'Derek Sheider'),
        ];

        return view("patients", [
            'patients' => $patients
        ]);

    }
}

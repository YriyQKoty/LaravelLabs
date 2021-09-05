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

    
}

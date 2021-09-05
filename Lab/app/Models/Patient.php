<?php

namespace App\Models;


class Patient
{
    private $fullname;
    private $doctor;
    private $recipes;

    public function __construct($fullname, $doctor)
    {
        $this->fullname = $fullname;
        $this->doctor = $fullname;
        $this->recipes = [];
    }

    public function getFullname () {
        return $this->fullname;
    }

    public function getDoctorName () {
        return $this->doctor;
    }

    public function getRecipes () {
        return $this->recipes;
    }

}

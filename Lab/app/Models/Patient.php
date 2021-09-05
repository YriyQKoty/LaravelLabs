<?php

namespace App\Models;


class Patient
{
    private $fullname;
    private $doctor;
    private $recipes;

    public function __construct($fullname, $doctor, $recipes = null)
    {
        $this->fullname = $fullname;
        $this->doctor = $doctor;
        $this->recipes = $recipes;
    }

    public function getFullname () {
        return $this->fullname;
    }

    public function getDoctorName () {
        return $this->doctor;
    }

    public function getRecipesCount() {
        return count($this->recipes);
    }

    public function getRecipes () {
        return $this->recipes;
    }

}

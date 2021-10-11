<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Patient extends Model
{
    protected $fillable = ['fullname', 'doctor'];

    public function recipes() {
        return $this->hasMany(Recipe::class, 'patient_id', 'id');
    }
}

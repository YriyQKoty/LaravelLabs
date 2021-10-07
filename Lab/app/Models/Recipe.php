<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['description', 'type', 'amount', 'patient_id'];

    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
}

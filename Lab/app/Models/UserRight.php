<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class UserRight extends Model
{
    protected $fillable = [
        'model',
        'user_id',
        'right',
    ];
}
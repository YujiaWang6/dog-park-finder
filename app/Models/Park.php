<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'park_name',
        'address',
        'postcode',
        'information',
        'latitude',
        'longitude',
        'city',
    ];
}

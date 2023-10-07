<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'park_id',
        'report',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function park(){
        return $this->belongsTo(Park::class, 'park_id');
    }
}

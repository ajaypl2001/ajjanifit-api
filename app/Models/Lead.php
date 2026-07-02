<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'gym_id',
        'name',
        'phone',
        'email',
        'source',
        'status',
        'remarks',
    ];

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
}
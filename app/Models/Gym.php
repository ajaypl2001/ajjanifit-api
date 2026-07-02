<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gym extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'gym_name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'logo',
        'status',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'gym_id',
        'branch_id',
        'name',
        'phone',
        'email',
        'specialization',
        'salary',
        'joining_date',
        'status',
    ];

    protected $casts = [
        'joining_date' => 'date',
    ];

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

    public function branch()
    {
        return $this->belongsTo(GymBranch::class);
    }
}
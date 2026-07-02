<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'gym_id',
        'branch_id',
        'member_code',
        'name',
        'email',
        'phone',
        'gender',
        'dob',
        'height',
        'weight',
        'join_date',
        'status',
    ];

    protected $casts = [
        'dob' => 'date',
        'join_date' => 'date',
    ];

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

    public function branch()
    {
        return $this->belongsTo(GymBranch::class, 'branch_id');
    }
}
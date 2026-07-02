<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GymBranch extends Model
{
    use HasFactory;

    protected $fillable = [
        'gym_id',
        'branch_name',
        'address',
        'phone',
        'manager_id',
    ];

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
}
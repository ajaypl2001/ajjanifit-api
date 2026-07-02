<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainerAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainer_id',
        'member_id',
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
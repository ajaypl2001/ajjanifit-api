<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DietPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainer_id',
        'member_id',
        'title',
        'description',
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
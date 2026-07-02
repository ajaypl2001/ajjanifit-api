<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainer_id',
        'amount',
        'salary_month',
        'status',
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}
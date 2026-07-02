<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'gym_id',
        'title',
        'amount',
        'expense_date',
        'category',
    ];

    protected $casts = [
        'expense_date' => 'date',
    ];

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
}
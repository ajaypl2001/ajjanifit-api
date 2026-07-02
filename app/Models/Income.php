<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Income extends Model
{
    use HasFactory;

    protected $fillable = [
        'gym_id',
        'member_id',
        'amount',
        'payment_method',
        'received_date',
    ];

    protected $casts = [
        'received_date' => 'date',
    ];

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
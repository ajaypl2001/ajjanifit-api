<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'status' => 'boolean',
        ];
    }

    // Roles Constants
    const SUPER_ADMIN = 'super_admin';
    const GYM_OWNER = 'gym_owner';
    const MANAGER = 'manager';
    const TRAINER = 'trainer';
    const RECEPTIONIST = 'receptionist';
    const MEMBER = 'member';
    const FINANCE_MANAGER = 'finance_manager';
}
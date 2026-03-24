<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; 
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => 'string', 
        ];
    }

    /**
     * Relationships based on your ERD
     */

    // User organizes many Tournaments
    public function tournaments(): HasMany
    {
        return $this->hasMany(Tournament::class, 'organizer_id');
    }

    // User has many Registrations
    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }
}
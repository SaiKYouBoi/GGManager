<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    public function tournaments()
    {
        return $this->hasMany(Tournament::class, 'organizer_id');
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function matchesAsPlayer1()
    {
        return $this->hasMany(GameMatch::class, 'player1_id');
    }

    public function matchesAsPlayer2()
    {
        return $this->hasMany(GameMatch::class, 'player2_id');
    }

    public function matchesWon()
    {
        return $this->hasMany(GameMatch::class, 'winner_id');
    }


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}

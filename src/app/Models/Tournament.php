<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = [
        'name',
        'game',
        'date',
        'max_participants',
        'status',
        'format',
        'organizer_id',
    ];


    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }


    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }


    public function matches()
    {
        return $this->hasMany(GameMatch::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'registrations')
                    ->withPivot('status', 'registered_at')
                    ->withTimestamps();
    }
}

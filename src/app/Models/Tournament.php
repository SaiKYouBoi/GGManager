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

    public function matches()
    {
        return $this->hasMany(Match::class);
    }
}

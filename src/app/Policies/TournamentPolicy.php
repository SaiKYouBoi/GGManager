<?php

namespace App\Policies;

use App\Models\Tournament;
use App\Models\User;

class TournamentPolicy
{
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Tournament $tournament): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Tournament $tournament): bool
    {
        return false;
    }

    public function delete(User $user, Tournament $tournament): bool
    {
        return false;
    }

    public function restore(User $user, Tournament $tournament): bool
    {
        return false;
    }

    public function forceDelete(User $user, Tournament $tournament): bool
    {
        return false;
    }
}

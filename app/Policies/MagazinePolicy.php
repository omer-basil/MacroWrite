<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Magazine;
use Illuminate\Auth\Access\HandlesAuthorization;

class MagazinePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function store(User $user, Magazine $magazine)
    {
        return $user->id === $magazine->user_id;
    }
}

<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Draft;
use Illuminate\Auth\Access\HandlesAuthorization;

class DraftPolicy
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

    public function delete(User $user, Draft $draft)
    {
        return $user->id === $draft->magazine->user_id;
    }
}

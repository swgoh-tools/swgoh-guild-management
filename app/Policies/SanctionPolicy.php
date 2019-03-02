<?php

namespace App\Policies;

use App\Sanction;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SanctionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create the sanction.
     *
     * @param  \App\User   $user
     * @param  \App\Sanction $sanction
     * @return mixed
     */
    public function create(User $user)
    {
        // return $sanction->user_id == $user->id;
		return $user->can('manage users');
    }

    /**
     * Determine whether the user can update the sanction.
     *
     * @param  \App\User   $user
     * @param  \App\Sanction $sanction
     * @return mixed
     */
    public function update(User $user, Sanction $sanction)
    {
        // return $sanction->user_id == $user->id;
		return $user->can('manage users');
    }
}

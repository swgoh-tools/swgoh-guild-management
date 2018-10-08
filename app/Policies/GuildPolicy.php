<?php

namespace App\Policies;

use App\User;
use App\Guild;
use Illuminate\Auth\Access\HandlesAuthorization;

class GuildPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the guild.
     *
     * @param  \App\User  $user
     * @param  \App\Guild  $guild
     * @return mixed
     */
    public function view(User $user, Guild $guild)
    {
        //
    }

    /**
     * Determine whether the user can create guilds.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the guild.
     *
     * @param  \App\User  $user
     * @param  \App\Guild  $guild
     * @return mixed
     */
    public function update(User $user, Guild $guild)
    {
        //
    }

    /**
     * Determine whether the user can delete the guild.
     *
     * @param  \App\User  $user
     * @param  \App\Guild  $guild
     * @return mixed
     */
    public function delete(User $user, Guild $guild)
    {
        //
    }

    /**
     * Determine whether the user can restore the guild.
     *
     * @param  \App\User  $user
     * @param  \App\Guild  $guild
     * @return mixed
     */
    public function restore(User $user, Guild $guild)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the guild.
     *
     * @param  \App\User  $user
     * @param  \App\Guild  $guild
     * @return mixed
     */
    public function forceDelete(User $user, Guild $guild)
    {
        //
    }
}

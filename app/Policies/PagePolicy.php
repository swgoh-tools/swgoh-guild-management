<?php

namespace App\Policies;

use App\Page;
use App\Role;
use App\User;
use App\Guild;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the page.
     *
     * @param  \App\User  $user
     * @param  \App\Page  $page
     * @return mixed
     */
    public function view(User $user, Page $page)
    {
        //
    }

    /**
     * Determine whether the user can create pages.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, $guild_id = null)
    {
        $guild = Guild::with('permUsers')->find($guild_id);
        if($guild) {
            foreach ($guild->permUsers as $perm) {
                $role = Role::find($perm->pivot->role_id);
                if($role && $role->hasPermissionTo('edit pages')) {
                    return true;
                }
            }
            return $guild->user_id === $user->id;
        }
        return $user->hasPermissionTo('edit pages');
    }

    /**
     * Determine whether the user can update the page.
     *
     * @param  \App\User  $user
     * @param  \App\Page  $page
     * @return mixed
     */
    public function update(User $user, Page $page)
    {
        foreach ($page->guild->permUsers as $perm) {
            $role = Role::find($perm->pivot->role_id);
            if($role->can('edit pages')) {
                return true;
            }
        }

        return $page->guild->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the page.
     *
     * @param  \App\User  $user
     * @param  \App\Page  $page
     * @return mixed
     */
    public function delete(User $user, Page $page)
    {
        //
    }

    /**
     * Determine whether the user can restore the page.
     *
     * @param  \App\User  $user
     * @param  \App\Page  $page
     * @return mixed
     */
    public function restore(User $user, Page $page)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the page.
     *
     * @param  \App\User  $user
     * @param  \App\Page  $page
     * @return mixed
     */
    public function forceDelete(User $user, Page $page)
    {
        //
    }
}

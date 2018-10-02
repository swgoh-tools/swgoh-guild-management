<?php

namespace App\Policies;

use App\Memo;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the memo.
     *
     * @param  \App\User   $user
     * @param  \App\Memo $memo
     * @return mixed
     */
    public function update(User $user, Memo $memo)
    {
        // return $memo->user_id == $user->id;
    }
}

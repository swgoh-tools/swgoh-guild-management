<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Jobs\CheckNewAllyCode;

class RegisterConfirmationController extends Controller
{
    /**
     * Confirm a user's email address.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $user = User::where('confirmation_token', request('token'))->first();

        if (! $user) {
            return redirect(route('home'))->with('flash', 'Unknown token.');
        }

        $user->confirm();

        // // This is done within the User Model instead
        // CheckNewAllyCode::dispatch($user, $user->code)
        // ->onQueue('default');

        return redirect(route('home'))
            ->with('flash', 'Your account is now confirmed! You may post to the forum.');
    }
}

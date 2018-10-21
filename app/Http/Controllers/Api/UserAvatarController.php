<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserAvatarController extends Controller
{
    /**
     * Store a new user avatar.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'avatar' => ['required', 'image']
        ]);

        auth()->user()->update([
            'avatar_path' => request()->file('avatar')->store('', 'avatars')
        ]);
        //$path = Storage::putFile('avatars', $request->file('avatar'));

        return response([], 204);
    }

    public function test($path)
    {
        $id = explode('/', $path);
        $id = array_pop($id);
        $url = Storage::disk('avatars')->url($id);

        auth()->user()->update([
            'avatar_path' => $url,
            'confirmation_token' => $path
        ]);

        return response([$path, $url, $id], 204);

    }
}

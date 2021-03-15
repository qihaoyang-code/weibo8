<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class FollowersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {
        $this->authorize('follow', $user);

        if (!Auth::User()->isFollowing($user->id)) {
            Auth::User()->follow($user->id);
        }

        return redirect()->route('users.show', $user->id);

    }

    public function destroy(User $user)
    {
        $this->authorize('follow', $user);

        if (Auth::User()->isFollowing($user->id)) {
            Auth::User()->unfollow($user->id);
        }

        return redirect()->route('users.show', $user->id);
    }
}




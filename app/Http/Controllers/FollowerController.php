<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowerController extends Controller
{
    public function FollowUnfollow(User $user)
    {
        $user->followers()->toggle(auth()->user());
        return response()->json([
            'followersCount' => $user->followers()->count(),
        ]);
    }
}

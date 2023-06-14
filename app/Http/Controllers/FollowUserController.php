<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\FollowUser;
use App\Models\profile;

class FollowUserController extends Controller
{
   public function follow(User $user) {
        $follow = FollowUser::create([
            'following_user_id' => \Auth::user()->id,
            'followed_user_id' => $user->id,
        ]);
        $followCount = count(FollowUser::where('followed_user_id', $user->id)->get());
        return back()->with('message', 'フォローしました');
    }

    public function unfollow(User $user) {
        $follow = FollowUser::where('following_user_id', \Auth::user()->id)->where('followed_user_id', $user->id)->first();
        $follow->delete();
        $followCount = count(FollowUser::where('followed_user_id', $user->id)->get());

        return back()->with('message', 'フォロー解除しました');
    }
}

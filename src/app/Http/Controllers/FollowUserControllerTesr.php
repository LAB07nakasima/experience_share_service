<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FollowUser;
use Illuminate\Support\Facades\Auth;

class FollowUserController extends Controller
{
    public function follow(User $user) {
        $follow = FollowUser::create([
            'following_user_id' => Auth::user()->id,
            // フォローするのは認証ユーザー（自分）
            'followed_user_id' => $user->id,
            // 暗黙の結合を使用してフォローされる相手のIDを取得
        ]);
        $followCount = count(FollowUser::where('followed_user_id', $user->id)->get());
        // ユーザーの数をcountして取得
        // whereBelongsToメソッド 与えられたモデルに対して適切なリレーションと外部キーを自動的に決定する

        dd($follow, $followCount);
        return redirect()->back();
    }

    public function unfollow(User $user)
    {
        $follow = FollowUser::where('following_user_id', Auth::user()->id)->where('followed_user_id', $user->id)->first();
        $follow->delete();
        $followCount = count(FollowUser::where('followed_user_id', $user->id)->get());

        return redirect()->back();
    }
}

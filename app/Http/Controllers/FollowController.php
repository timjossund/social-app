<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function createFollow(User $user) {
        //cannot follow yourself
        if ($user->id == auth()->user()->id) {
            return back()->with('error', 'You cannot follow yourself');
        }
         //cannot follow someone you already follow
         $existCheck = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->count();

         if ($existCheck) {
             return back()->with('error', 'You follow them already');
         }

         $newFollow = new Follow;
         $newFollow->user_id = auth()->user()->id;
         $newFollow->followeduser = $user->id;
         $newFollow->save();

         return back()->with('success', 'Following');
    }

    public function removeFollow(User $user) {
        Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->delete();
        return back()->with('success', 'Unfollowed');
    }
}

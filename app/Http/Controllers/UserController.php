<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class UserController extends Controller
{
    public function register(Request $request) {
        $incomingFields = $request->validate([
            'username' => ['required', 'min:4', 'max:25', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed']
        ]);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/')->with('success', 'Thank you for creating an account!');
    }

    public function showAvatarForm() {
        return view('avatar-form');
    }

    public function saveAvatar(Request $request) {
        $request->validate([
            'avatar' => 'required|image|max:5000'
        ]);
        $user = auth()->user();
        $filename = $user->id . "-" . uniqid() . ".jpg";
        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->file('avatar'));
        $imgData = $image->cover(120, 120)->toJpeg();
        Storage::disk('public')->put('avatars/'.$filename, $imgData);

        $oldAvatar = $user->avatar;

        $user->avatar = $filename;
        $user->save();

        if ($oldAvatar != '/fallback-avatar.jpg') {
            Storage::disk('public')->delete(str_ireplace('/storage/', "", $oldAvatar));
        }

        return back()->with('success', 'New avatar saved!');
    }

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);
        if (auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'You are logged in!');
        } else {
            return redirect('/')->with('error', 'Invalid login...');
        };
    }

    public function logout() {
        auth()->logout();
        return redirect('/')->with('success', 'You are logged out!');
    }

    public function showCorrectHomePage() {
        if (auth()->check()) {
            return view('home-feed');
        } else {
            return view('home');
        }
    }

    private function getSharedData($user) {
        $currentlyFollowing = 0;

        if (auth()->check()) {
            $currentlyFollowing = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->count();
        }

        View::share('sharedData', ['currentlyFollowing' => $currentlyFollowing, 'username' => $user->username, 'avatar' => $user->avatar, 'postCount' => $user->posts()->count(), 'followerCount' => $user->followers()->count(), 'followingCount' => $user->followings()->count()]);
    }

    public function showProfile(User $user) {
        $this->getSharedData($user);
        return view('profile-post', ['posts' => $user->posts()->latest()->get()]);
    }

    public function showProfileFollowers(User $user) {
        $this->getSharedData($user);
        return view('profile-followers', ['followers' => $user->followers()->latest()->get()]);
    }

    public function showProfileFollowing(User $user) {
        $this->getSharedData($user);
        return view('profile-following', ['followings' => $user->followings()->latest()->get()]);
    }
}

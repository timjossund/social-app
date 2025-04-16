<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showCreateForm () {
        return view('create-post');
    }

    public function editPost (Post $post) {
        return view('edit-post', ['post' => $post]);
    }

    public function updatePost (Post $post, Request $request) {
         $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);
        
        return back()->with('success', 'Your post was updated');
    }

    public function deletePost (Post $post) {
        $post->delete();
        return redirect("/profile/" . auth()->user()->username)->with('success', 'Your post was deleted');
    }

    public function storeNewPost(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        $newPost = Post::create($incomingFields);
        
        return redirect("/post/{$newPost->id}")->with('success', 'Your post was created');
    }

    public function showSinglePost(Post $post) {
        $post['body'] = Str::markdown($post->body);
        return view('single-post', ['post' => $post]);
    }
}

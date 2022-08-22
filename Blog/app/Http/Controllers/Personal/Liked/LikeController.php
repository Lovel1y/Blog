<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Models\Post;

class LikeController
{
    public function index()
    {
        $posts = auth()->user()->likedPosts;

        return view('personal.liked.index', compact('posts'));
    }

    public function delete(Post $post)
    {
        auth()->user()->likedPosts()->detach($post->id);

        return redirect()->route('personal.liked.index');
    }
}

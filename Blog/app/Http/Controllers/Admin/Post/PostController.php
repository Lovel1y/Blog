<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\RestoreRequest;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends BaseController
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('admin.post.index');
    }

    public function show(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.show', compact('post', 'categories'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post = $this->service->update($data, $post);
        return view('admin.post.show', compact('post'));

    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'tags', 'categories'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');

    }

    public function restore()
    {
        return view('admin.post.restore');
    }

    public function restoreStore(RestoreRequest $request)
    {
        $data = $request->validated();

        $post = Post::withTrashed()->find($data['id']);

        $post->restore();

        return redirect()->route('admin.post.index');
    }
}


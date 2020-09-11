<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
      return view('posts.index', ['posts' => Post::latest()->get()]);
    }

    public function show(Post $post)
    {
      return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
      return view('posts.create');
    }

    public function store()
    {
      Post::create($this->validatePost());
      return redirect('/posts');
    }

    public function edit(Post $post)
    {
      return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
      $post->update($this->validatePost());
      // Original method commented, path method in model
      // return redirect('/posts/' . $post->slug);
      return redirect($post->path());
    }

    protected function validatePost(){
      return request()->validate([
        'title' => 'required',
        'body' => 'required',
        'tags' => 'exists:tags.id',
      ]);
    }
}

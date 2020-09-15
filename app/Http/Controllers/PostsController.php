<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {

      // For now I'm having users post index as a user method to show in users profile
      // return view('posts.index', ['posts' => Post::latest()->get()]);
    }

    public function show(Post $post)
    {
      // Currently no need to show one individual post
    }

    public function create()
    {
      // Done via profile or feed
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
      ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
      return view('user_profiles.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
      return view('user_profiles.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
      $user->update($this->validateUser());
      // Original method commented, path method in model
      // return redirect('/posts/' . $post->slug);
      return redirect($user->path());
    }
}

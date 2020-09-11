<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

  public function path() {

    return route('post.show', $this);
  }

  public function user(){
    // This will create a method post->user() that returns a user instance for who wrote the post

    // If user has been deleted will return deleted user
    return $this->belongsTo(User::class, 'user_id')->withDefault([
        'name' => '[deleted user]',
    ]); 
  }

  public function comments() {

    // Method post->comments() to return all of a posts comments
    // Again not sure if eloquent is going to get the right table
    // My guess is it will look for post_comments instead of just comments, but that might just be for belongs to many relationships. 
    return $this->hasMany(Comment::class);
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function path() {
        // This becomes a method called via $post->path()
        // I can reference post.show because I named this route in web.php
        return route('user_profile.show', $this);
      }

    public function posts() {

        // Method user->posts() that returns the posts the user has created
        return $this->hasMany(Post::class);
    }

    public function plants() {

        // Method user->plants() that returns the users plants

        // May need to specify table 'user_plants' but I want to test eloquent naming conventions first. 
        return $this->belongsToMany(Plant::class, 'user_plants', 'user_id', 'plant_id');
    }

    public function follow(User $user)
    {
        return $this->following()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->following()->detach($user);
    }

    public function following() {

        // Method user->following returns users that current user is following
        // Need to explicitly state table name follows or else the table will look for user_users
        return $this->belongsToMany(User::class, 'follows');
    }

    public function followedBy() {

        // Method user->followedBy returns all users following current user
        return $this->following()
            ->where('followed_user_id', $user->id)
            ->exists();
    }
}

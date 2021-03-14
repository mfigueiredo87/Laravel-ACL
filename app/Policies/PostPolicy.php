<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Post;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function updatePost(user $user, Post $post){
        return $user ->id== $post->user_id;
    }

    public function before(User $user){
        return $user->name == 'Manuel Figueiredo';
    }
}

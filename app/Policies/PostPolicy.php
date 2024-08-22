<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can update or delete the model.
     */
    public function authorize(User $user, Post $post): Response
    {
        return $user->id === $post->user_id || $user->isAdmin()
            ? Response::allow()
            : Response::deny("This post doesn't belongs to you.");
    }

    public function admin(User $user)
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::deny("Unauthorized");
    }
}

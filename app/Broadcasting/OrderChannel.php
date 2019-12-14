<?php

namespace App\Broadcasting;

use App\Models\Post;
use App\Models\User;

class OrderChannel
{

  //  protected $post;

    /**
     * Create a new channel instance.
     *
     * @param int $data
     */
    public function __construct(/*Post $post*/)
    {

       // $this->post = $post;
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\Models\User $user
     * @param Post $post
     * @return array|bool
     */
    public function join(User $user,Post $post)
    {
       // dd($user,$post);
        return $user->id === $post->user_id;
    }
}

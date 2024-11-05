<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;

class PostService
{

    public function getUserPosts(User $user, $requestAll = [])
    {
        return $user->posts()->filter($requestAll)->get();
    }
    
    public function createPost(User $user, array $data): Post
    {
        return $user->posts()->create($data);
    }

    public function updatePost(Post $post, array $data): Post
    {
        $post->update($data);
        return $post;
    }

    public function deletePost(Post $post): bool
    {
        return $post->delete();
    }
}

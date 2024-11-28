<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use Cache;

class PostService
{

    // without caching
    public function getUserPosts(User $user, $requestAll)
    {
        return $user->posts()->filter($requestAll)->get();
    }

    // with caching
    // public function getUserPosts(User $user, $requestAll = [])
    // {
    //     return Cache::remember("user_{$user->id}_posts", now()->addMinutes(5), function () use ($user, $requestAll) {
    //         return $user->posts()->filter($requestAll)->get();
    //     });
    // }
    
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

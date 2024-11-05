<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(User $user, Request $request)
    {
        $posts = $this->postService->getUserPosts($user, $request->all());
        return response()->json($posts);
    }

    public function store(StorePostRequest $request, User $user)
    {
        $post = $this->postService->createPost($user, $request->validated());
        return response()->json($post, 201);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post = $this->postService->updatePost($post, $request->validated());
        return response()->json($post);
    }

    public function destroy(Post $post)
    {
        $this->postService->deletePost($post);
        return response()->json(null, 204);
    }
}
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;

// Basic API routes for users
Route::apiResource('users', UserController::class);

// GET /api/users
// POST /api/users
// GET /api/users/{user}
// PUT /api/users/{user}
// DELETE /api/users/{user}

// Nested resource routes for posts within users
Route::apiResource('users.posts', PostController::class);

// GET /api/users/{user}/posts
// POST /api/users/{user}/posts
// GET /api/users/{user}/posts/{post}
// PUT /api/users/{user}/posts/{post}
// DELETE /api/users/{user}/posts/{post}

Route::apiResource('products',  ProductController::class);

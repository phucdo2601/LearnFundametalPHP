<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Public Routes
Route::post("/register", [AuthController::class, 'register']);
Route::post("/login", [AuthController::class, 'login']);

//Protected Routes
Route::group(['middleware'=> ['auth:sanctum']], function() {

    //User
    Route::get("/user", [AuthController::class, 'user']);
    Route::put('/user', [AuthController::class, 'update']);
    Route::post("/logout", [AuthController::class, 'logout']);

    //Post
    Route::get("/posts", [PostController::class, 'index']); //all posts
    Route::post("/posts", [PostController::class, 'store']); //create a new post
    Route::get("/posts/{id}", [PostController::class, 'show']); //get a post by id
    Route::put("/posts/{id}", [PostController::class, 'update']); // update a post
    Route::delete("/posts/{id}", [PostController::class, 'destroy']); //delete a post

    // Comments
    Route::get("/posts/{id}/comments", [CommentController::class, 'index']); // all comments of post
    Route::post("/posts/{id}/comments", [CommentController::class, 'store']); // create a comment of post
    Route::put('/comments/{id}', [CommentController::class, 'update']); // update a comment
    Route::delete('/comments/{id}', [CommentController::class, 'destroy']); // delete a comment

    // Likes
    Route::post("/posts/{id}/likes", [LikeController::class, 'likeOrUnlike']); // like or dislike a post
});

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // get all posts
    public function index(){
        return response([
            'posts' => Post::orderBy('created_at', 'desc')->with('user:id,name,image')->withCount('comments', 'likes')->get()
        ], 200);
    }

    //get single post
    public function show($id) {
        return response([
            'post' => Post::where('id', $id)->withCount('comments', 'likes')->get()
        ], 200);
    }

    // create a new post
    public function store(Request $request) {
        //validate request
        $attrs = $request->validate([
            'body' => 'required|string',
        ]);

        $post = Post::create([
            'body' => $attrs['body'],
            'user_id' => auth()->user()->id
        ]);

        return response([
            'message' => 'Post created successfully',
            'post' => $post
        ], 200);
    }

    public function update(Request $request, $id) {
        $post = Post::find($id);

        if (!$post) {
            return response([
                'message' => 'Post not found',
            ], 404);
        }

        if ($post->user_id != auth()->user()->id) {
            return response([
                'message' => 'Permission denied.',
            ], 403);
        }

        //validate request
        $attrs = $request->validate([
            'body' => 'required|string',
        ]);

        $post->update([
            'body' => $attrs['body'],
        ]);

        return response([
            'message' => 'Post updated successfully',
            'post' => $post
        ], 200);
    }

    public function destroy($id) {
        $post = Post::find($id);

        if (!$post) {
            return response([
                'message' => 'Post not found',
            ], 404);
        }

        if ($post->user_id != auth()->user()->id) {
            return response([
                'message' => 'Permission denied.',
            ], 403);
        }


        $post->comments()->delete();
        $post->likes()->delete();
        $post->delete();


        return response([
            'message' => 'Post deleted successfully',
        ], 200);
    }
}
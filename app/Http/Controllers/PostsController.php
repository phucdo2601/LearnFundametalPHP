<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    //

    public function index()
    {

        // $posts = DB::select("SELECT * FROM posts WHERE id = :id;",
        // [
        //     'id' => 3
        // ]);

        $listPost = DB::table("posts")
                    ->where('id', '=', 3)
                    // ->select('body')
                    ->get();

        // $listPost = DB::table("posts")
        //             ->where('id', '=', 3)
        //             ->orWhere('title', '=', 'Dr.')
        //             ->get();

        // $listPost = DB::table("posts")
        // ->whereBetween('id', [1, 5])
        // ->get();

        // $listPost = DB::table("posts")
        // ->whereNotNull('created_at')
        // ->get();

        // $listPost = DB::table("posts")
        // ->whereNotNull('created_at')
        // ->orderBy('id', 'desc')
        // ->get();

        // $listPost = DB::table("posts")
        // ->whereNotNull('created_at')
        // ->latest()
        // ->get();

        // $listPost = DB::table("posts")
        // ->find(3);

        // $listPost = DB::table("posts")
        // ->count();

        // $listPost = DB::table("posts")
        // ->min('id');

        //     $listPost = DB::table("posts")
        //    ->sum('id');

        // $listPost = DB::table("posts")
        //     ->avg('id');

        //insert
        //     $listPost = DB::table("posts")
        //    ->insert([
        //     'title' => "test-insert-title08",
        //     'body' => "test-insert-body08",
        //     'created_at' => now(),    
        //    ]);

        //update
        // $listPost = DB::table("posts")
        //     ->where('id', '=', 7)
        //     ->update([
        //         'title' => "test-update-title07",
        //         'body' => "test-update-body07",
        //     ]);

        // $listPost = DB::table("posts")
        //     ->where("id", "=", 8)
        //     ->delete();

        // $listPost = DB::select("SELECT * FROM posts;");
        dd($listPost); //dd = die dump
        // return view('posts.index', [
        //     'listPost' => $listPost
        // ]);
    }
}

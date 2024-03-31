<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    function index()
    {

        // DB::insert("insert into users (name, email, password) values (?, ?, ?)", [
        //     'test04', "test04@gmail.com", "12345678"
        // ]);

        // DB::update("update users set email = ? where id = ?", [
        //     "test01-up@gmail.com", 1
        // ]);

        // DB::delete("delete from users where email = ?", [
        //     "test04@gmail.com"
        // ]);

        $users = DB::select("select * from users");
        // return view('home');

        return $users;
    }
}

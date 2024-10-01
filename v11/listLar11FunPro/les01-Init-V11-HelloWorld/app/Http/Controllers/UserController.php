<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function getUser() {
        return "this is get user function!";
    }

    function aboutUser($name) {
        // return "Hello, this is ".$name;
        return view('about', ['name' => $name]);
    }

    function getUserDetailPage() {
        return view("user");
    }

    function getAdminLoginPage($name) {
        return view('admin.login', ['displayName' => $name]);
    }
}


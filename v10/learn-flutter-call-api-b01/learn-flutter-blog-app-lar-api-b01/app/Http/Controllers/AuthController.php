<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register user function
    public function register(Request $request) {

        // Validate fields
        $attrs = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        //create user
        $user = User::create([
            'name' => $attrs['name'],
            'email' => $attrs['email'],
            'password' => $attrs['password'],
        ]);

        //return user
        return response([
            'user' => $user,
            'token' => $user->createToken('secret')->plainTextToken,
        ]);
    }

    public function login(Request $request){
        // Validate fields
        $attrs = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // login failed
        if (!Auth::attempt($attrs)) {
            return response([
                'message' => 'Invalid credentials.'
            ], 403);
        }

        //return user
        return response([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken,
        ],200);
    }

    //logout func
    public function logout() {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logout Success'
        ], 200);
    }

    //get user details
    public function user() {
        return response([
            'user' => auth()->user()
        ]);
    }

    //update user
    public function update(Request $request) {
        $attrs = $request->validate([
            'name' => 'required|string'
        ]);

        $image = $this->saveImage($request->image, 'profiles');

        auth()->user()->update([
            'name' => $attrs['name'],
            'image' => $image
        ]);

        return response([
            'message' => 'User updated.',
            'user' => auth()->user()
        ], 200);
    }
}

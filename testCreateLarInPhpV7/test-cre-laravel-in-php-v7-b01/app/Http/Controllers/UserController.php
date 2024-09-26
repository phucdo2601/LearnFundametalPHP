<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        // $users = DB::select("select * from users");
        // return view('home');

        // return $users;


        $user = new User();

        // dd($user);

        /**
         * USING ORM for CRUD function with db
         */

        // insert
        // $user->name = "testName05";
        // $user->email = "testEmail05@gmail.com";
        // $user->password = bcrypt("12345678");
        // $user->save();

        // select all
        // $users = User::all();
        // return $users;

        //delete
        // User::where('id', 6)->delete();

        // return view('home');

        //update
        // User::where('id', 7)->update([
        //     'name'  => 'testName-up-05'
        // ]);

        // return view('home');

        //  Mass Assignment Security
        // User::where('email', 'testEmail08@gmail.com')->delete();

        // $data_ins = [
        //     'name' => 'testName08',
        //     'email' => 'testEmail08@gmail.com',
        //     'password' => "12345678",
        // ];

        // User::create($data_ins);

        $listUsers = User::all();

        return $listUsers;
    }

    public function uploadAvartar(Request $request)
    {
        if ($request->hasFile('image')) {
            User::uploadAvartar($request->image);

            $request->session()->flash('message', 'Image uploaded.');

            return redirect()->back();
        }
        $request->session()->flash('error', 'Image not uploaded.');
        return redirect()->back();
    }
}

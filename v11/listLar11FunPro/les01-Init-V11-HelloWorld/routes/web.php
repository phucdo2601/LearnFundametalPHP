<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/test', function() {
//     return view('welcome');
// });

// // Route::get("/home", function() {
// //     return view('home');
// // });

// Route::view('/home', 'home');
// Route::redirect("/home", '/');

// Route::view('/test-view-call', 'home');

// Route::get('/about-page/{name}', function($name) {
//     echo $name;
//     return view('about', ['name' => $name]);
// });

Route::get('user', [UserController::class, "getUser"]);

Route::get('aboutUser/{name}', [UserController::class, 'aboutUser']);

Route::get('testDetailsUser', [UserController::class, "getUserDetailPage"]);

Route::get('admin/loginPage/{name}', [UserController::class, "getAdminLoginPage"]);

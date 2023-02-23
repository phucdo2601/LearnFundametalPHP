<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FoodsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
//     // return env('APP_NAME');
// });

/*
//get string on page
Route::get('/user', function () {
    return 'This is users page';
});

//response array
Route::get('/foods', function () {
    return ['sushi', 'sasimi',  'hamberger'];
});

//response an object
Route::get("/aboutMe", function () {
    return response()->json([
        'name' => 'Phuc Do',
        'address' => 'Ho Chi Minh',
        'age' => 23,
        'isMarried' => false,
    ]);
});

//response the list object
Route::get("/listAboutMe", function () {
    return response()->json([
        [
            'name' => 'Phuc Do',
            'address' => 'Ho Chi Minh',
            'age' => 23,
            'isMarried' => false,
        ],

        [
            'name' => 'Tran Thanh',
            'address' => 'Ha Noi',
            'age' => 26,
            'isMarried' => true,
        ],

        [
            'name' => 'Hoang Tien',
            'address' => 'Can Tho',
            'age' => 31,
            'isMarried' => true,
        ]
    ]);
});

//response another request = redirect 
Route::get('/testRe01', function(){
    return redirect('/');
});

*/

// Route::get('/products', [
//     ProductsController::class,
//     'index' // index function of ProductController
// ])->name('products'); //define route name



// router with path /products/{id}
//how to validate params
// Route::get('/products/{id}', [
//     ProductsController::class,
//     'details' 
// ]);

// Route::get('/products/{id}', [
//     ProductsController::class,
//     'details' 
// ]) -> where('id', '[0-9]+');
//What about string patterns? '[a-ZA-Z]+'

// truong hop co nhieu tham so 
// Route::get('/products/{productName}/{id}', [
//     ProductsController::class,
//     'details' 
// ]) -> where([
//     'productName', '[a-zA-Z0-9]+',
//     'id', '[0-9]+',
// ]);


Route::get('/', [
    PagesController::class, 'index' // index function of PagesController
]);

Route::get('/about', [
    PagesController::class, 'about' // index function of PagesController
]);

Route::get('/posts', [
    PostsController::class, 'index' // index function of PagesController
]);

Route::resource(
    '/foods',
    FoodsController::class
);

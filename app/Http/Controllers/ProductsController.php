<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //

    public function index()
    {
        //how to pass data to view?
        $title = 'Lavarel Course from Phuc Do';
        $x = 1;
        $y = 2;
        $name = 'Phuc do';
        //compact can ben sent multiple variables
        // return view('products.index', compact('title', 'x', 'y'));

        //pass data using 'with' function: can only send 1 parameter    
        // return view('products.index')->with('name', $name) ;

        //send an associative array
        $myPhone = [
            'name' => 'iphone 14',
            'year' => 2022,
            'isFavorite' => true
        ];

        // return view('products.index', compact('myPhone'));

        //send directly
        // return view('products.index', [
        //     'myPhone' => $myPhone
        // ]);

        print_r(route('products'));
        return view('products.index');
    }

    public function about()
    {
        return "This is About Page";
    }

    // public function details($id) {
    //     // return "product 's id = {$id}";

    //     // return view("products.index", [
    //     //     'product' => [
    //     //         'name' => 'iphone 14 Pro Max',
    //     //         'year' => 2022
    //     //     ]
    //     // ]);

    //     $phones = [
    //         'iphone15' => 'iphone-15',
    //         'samsung' => 'samsung',
    //     ];

    //     return view("products.index", [
    //             'product' => $phones[$id]
    //         ]);
    // }

    //xu ly truong hop nhieu tham gio tren routes
    public function details($productName, $id)
    {
        // return "productName :{$productName}; id :{$id}";
        return view("products.index");
    }
}

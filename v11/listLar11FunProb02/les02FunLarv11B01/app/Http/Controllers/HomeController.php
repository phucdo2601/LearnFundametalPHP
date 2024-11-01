<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // 
    public function index () {
        return view('admin.index');
    }

    public function home() {

        $list_products = Product::all();
        return view('home.index', compact('list_products'));
    }

    public  function login_home() {
        $list_products = Product::all();
        return view('home.index', compact('list_products'));
    }
}

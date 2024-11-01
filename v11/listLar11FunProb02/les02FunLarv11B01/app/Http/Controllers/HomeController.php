<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function product_details($product_id) {
        $product_details = Product::find($product_id);
        return view('home.product_details', compact("product_details"));
    }

    public function add_cart($product_id) {
        $user = Auth::user();

        $user_id = $user->id;

        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;

        $data->save();

        flash()
            ->option('timeout', 3000)
            ->success('Add Cart was completed successfully.');

        return redirect()->back();
    }
}

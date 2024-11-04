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

        if (Auth::id()) {
            $user = Auth::user();

            $userId = $user->id;

            $cart_count = Cart::where('user_id', $userId)->count();
        }
        else {
            $cart_count = "";
        }

        return view('home.index', compact('list_products', 'cart_count'));
    }

    public  function login_home() {
        $list_products = Product::all();

        $user = Auth::user();

        $userId = $user->id;

        $cart_count = Cart::where('user_id', $userId)->count();

        return view('home.index', compact('list_products', 'cart_count'));
    }

    public function product_details($product_id) {
        $product_details = Product::find($product_id);

        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $cart_count = Cart::where('user_id', $userId)->count();
        }
        else {
            $cart_count = '';
        }
        

        return view('home.product_details', compact("product_details", "cart_count"));
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

    public function mycart() {
        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $cart_count = Cart::where('user_id', $userId)->count();

            $list_user_cart = Cart::where('user_id', $userId)->get();
        }
        else {
            $cart_count = '';
        }
        return view('home.mycart', compact(['cart_count', 'list_user_cart']));
    }
}

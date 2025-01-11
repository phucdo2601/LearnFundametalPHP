<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index()
    {
        $listProducts = Product::orderBy('created_at', 'DESC')->paginate(12);
        return view('front.shop', compact('listProducts'));
    }

    public function product_details($product_slug)
    {
        $productBySlug = Product::where('slug', $product_slug)->first();
        $rProducts = Product::where('slug', '<>', $product_slug)->get()->take(8);
        return view('front.details', compact('productBySlug', 'rProducts'));
    }
}

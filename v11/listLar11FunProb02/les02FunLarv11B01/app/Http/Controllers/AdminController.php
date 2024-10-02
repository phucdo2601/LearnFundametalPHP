<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // [Function for vieing categories]
    public function view_category() {
        $data = Category::all();

        return view('admin.category', compact('data'));
    }

    // [Function for creating category]
    public function add_category(Request $request) {
        $category = new Category;
        $category->category_name = $request->category;

        $category->save();

        flash()
            ->option('timeout', 3000)
            ->success('Add Category was completed successfully.');

        return redirect()->back();
    }
}

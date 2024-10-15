<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // [Function for vieing categories]
    public function view_category()
    {
        $data = Category::all();

        return view('admin.category', compact('data'));
    }

    // [Function for creating category]
    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;

        $category->save();

        flash()
            ->option('timeout', 3000)
            ->success('Add Category was completed successfully.');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();

        flash()
            ->option('timeout', 3000)
            ->success('Delete Category was completed successfully.');

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category_name;

        $data->save();

        flash()
            ->option('timeout', 3000)
            ->success('Update Category was completed successfully.');

        return redirect('/view_category');
    }
}

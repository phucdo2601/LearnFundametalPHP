<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

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

    public function add_product()
    {
        $list_all_cates = Category::all();

        return view('admin.add_product', compact('list_all_cates'));
    }

    public function upload_product(Request $request)
    {
        $data = new Product;

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;

        if ($image) {
            $imagename = time() . "." . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);

            $data->image = $imagename;
        }

        $data->save();

        flash()
            ->option('timeout', 3000)
            ->success('Add Product was completed successfully.');

        return redirect()->back();
    }

    public function view_product()
    {
        $list_products = Product::paginate(5);
        return view('admin.view_product', compact('list_products'));
    }

    public function delete_product($productId)
    {
        $data = Product::find($productId);

        $image_path = public_path('products/' . $data->image);

        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $data->delete();

        flash()
            ->option('timeout', 3000)
            ->success('Delete Product was completed successfully.');

        return redirect()->back();
    }

    public function update_product($productId)
    {
        $data = Product::find($productId);
        $list_all_cates = Category::all();

        return view('admin.update_pro_page', compact('data', 'list_all_cates'));
    }

    public function edit_product(Request $request, $productId)
    {
        $data = Product::find($productId);

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;

        if ($image) {
            // delete old images
            $oldimages = public_path('products/' . $data->image);
            if (file_exists($oldimages)) {
                # code...
                unlink($oldimages);
            }

            $imagename = time() . "." . $image->getClientOriginalExtension();

            $request->image->move('products', $imagename);

            $data->image = $imagename;
        }

        $data->save();

        flash()
            ->option('timeout', 3000)
            ->success('Update Product was completed successfully.');

        return redirect('/view_product');
    }

    public function product_search(Request $request)
    {
        $search = $request->searchProduct;

        $list_products = Product::where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('category', 'LIKE', '%' . $search . '%')
            ->paginate(5);

        return view('admin.view_product', compact('list_products'));
    }
}

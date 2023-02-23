<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foods;
use App\Models\Category;
use App\Rules\Uppercase;
use App\Http\Requests\CreateValidationRequest;

class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listFoods = Foods::all();
        // dd($listFoods);
        return view('foods.index', [
            'listFoods' => $listFoods
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
        $categories = Category::all();
        
        return view('foods.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateValidationRequest $request)
    {
        //
        // dd('This is store function0');
        // $food = new Foods();
        // $food->name = $request->input('name');
        // $food->count = $request->input('count');
        // $food->description = $request->input('description');
        // $request->validate([
        //     'name' =>'required|unique:foods',
        //     'category_id' =>'required:integer',
        //     'count' =>'required|min:0|max:1000',
        // ]);

        // $request->validated();
        // dd($request);

        $request->validate([
            'name' => 'required',
            'count' => 'required|integer|min:0|max:200',
            'image' => 'required|mimes:jpg,png,jpeg|max:50480000'
        ]);

        //client image's name and server's image name
        //must be different, why ??
        $generatedImageName = 'image'.time().'-'.$request->name. '.'.$request->image->extension();

        //move to folder
        $request->image->move(public_path('images'), $generatedImageName);

        // dd($generatedImageName);

        //if the validation is pass, it will come here !

        $food = Foods::create([
            // 'name' => $request->input('name'),
            'name' => $request->input('name'),
            'count' => $request->input('count'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'image_path' => $generatedImageName
        ]);

        //save to database
        $food -> save();

        return redirect('/foods');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // dd('This is show function!');

        $food =Foods::find($id);
        $category = Category::find($food->category_id);
        $food->category = $category;
        // dd($food);
        return view('foods.show', [
            'food' => $food
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $food = Foods::find($id);
        return view('foods.edit', [
            'food' => $food,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // dd('This is update function');
        $food = Foods::where('id', $id)->update([
            'name' => $request->input('name'),
            'count' => $request->input('count'),
            'description' => $request->input('description'),
        ]);

        return redirect('/foods');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $food = Foods::find($id);
        $food->delete();
        //dd($id);
        return redirect('/foods');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::latest()->with('category')->paginate(2);
        //
        return view('food.index', ['foods'=>$foods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $category = Category::all();
        return view('food.create', ['categories'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validate_data = $request->validate([
            'name'=> 'required',
            'description'=> 'required',
            'price'=> 'required|integer',
            'category'=> 'required',
            'image' => 'required'
        ]);


        // Get Image
        $image = $request->image;
      
        $name = time().'.'.$image->getClientOriginalExtension();
        // Laravel can create a folder if not exist
        $destinationPath = public_path('/images');

        $image->move($destinationPath, $name);
        
        // Store data
        $food = Food::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category,
            'image'=>$name

        ]);

        return redirect()->back()->with('message', 'Success add food');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $food = Food::find($id);

        $categories = Category::all();

        return view('food.edit', ['food'=>$food, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $food = Food::find($id);

        $validate_data = $request->validate([
            'name'=> 'required',
            'description'=> 'required',
            'price'=> 'required|integer',
            'category'=> 'required'
        ]);

        $name_image = $request->image_hidden;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name_image = time().'.'.$image->getClientOriginalExtension();
            // Laravel can create a folder if not exist
            $destinationPath = public_path('/images');

            $image->move($destinationPath, $name_image);
        }

        $food->name = $request->name;
        $food->description = $request->description;
        $food->price = $request->price;
        $food->category_id = $request->category;
        $food->image = $name_image;

        $food->save();

        return redirect()->back()->with('message', 'Success update food');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $food = Food::findOrFail($id);
        $food->delete();

        return redirect()->back()->with('success', 'Success delete food');
    }

    public function listFood(){
        $categories = Category::with('foods')->get();

        return view('food.list', ['categories'=>$categories]);
    }

    public function detail($id) {
        $food = Food::findOrFail($id);

        return view('food.detail', ['food' => $food]);
    }
}

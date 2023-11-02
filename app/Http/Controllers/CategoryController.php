<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('sad');
        $categories = Category::all();
        return view("category.table", ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("category.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            "Name"=> "required",
            "Details"=> "required",
        ]);

            Category::create($data);
            return redirect()->route("category.create");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category= Category::find($id);
        return response()->json([
            'status'=>200,
            'category'=>$category
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data=$request->validate([
            "Name"=> "required",
            "Details"=> "required",]);
//            Category::find($id)->update($data);
//            return redirect()->route("category.index");
//        $id=$request->input('id');
        $category= Category::findOrFail($request->input('id'));
        $category->Name=$request->input('Name');
        $category->Details=$request->input('Details');
        $category->save();
        return redirect()->route('update')->with('success','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrfail($id);
        $category->delete();

        return redirect()->route('category.index');
    }
}

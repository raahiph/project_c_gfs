<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $total_categories = $categories->count();
        return view('categories.index',compact('categories','total_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;

        $category->name = $request->name;

        $category->save();

        return redirect('categories')->with('message','Supplier added successfully.')
                                    ->with('alert-class','alert-success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('categories.create-edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;

        $category->save();

        return redirect('categories')->with('message','Category updated successfully.')
                                    ->with('alert-class','alert-success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('categories')->with('message','Category deleted.')
                                    ->with('alert-class','alert-danger');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\UnitType;
use App\Models\Supplier;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $total_products = $products->count();
        return view('products.index', compact('products', 'total_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unitType = UnitType::all();
        $category = Category::all();
        $supplier = Supplier::all();
        return view('products.create', compact('unitType', 'category', 'supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:products,name',
            'code' => 'required',
            'units' => 'required',
            'price' => 'required',
            'unit_type_id' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'description' => 'bail',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasfile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $product = Product::create(array_merge($request->all(), ["image" => $imageName]));

        return redirect()->route('products.create')
            ->with('success', 'Product created successfully');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unitType = UnitType::all();
        $category = Category::all();
        $supplier = Supplier::all();
        $product = Product::find($id);
        return view('products.edit', compact('unitType', 'category', 'supplier', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $rules =  [
            'name' => 'required|unique:products,name,' . $id,
            'code' => 'required',
            'units' => 'required',
            'price' => 'required',
            'unit_type_id' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'description' => 'bail',

            'image' => 'bail|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];
        $this->validate($request, $rules, $customMessages);
        // if ($request->hasfile('image')) {
        //     $imageName = time() . '.' . $request->image->extension();
        //     $request->image->move(public_path('images'), $imageName);
        // }
        $imageName = $product->image;
        if ($request->hasfile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        $product->update(array_merge($request->all(), ["image" => $imageName]));

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();

            return redirect()->route('products.index')
                ->withSuccess(__('Product deleted successfully.'));
        } catch (\Exception $exception) {

            $errormsg = 'product not deleted check database!' . $exception->getCode();
            return  redirect()->back()->with('error', $errormsg);
        }
    }
}

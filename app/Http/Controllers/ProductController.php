<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {


        $product = new Product;
        $product->name = $request->name;
        $product->title = $request->title;
        $product->save();


        return response()->json(['data' => $product]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json(['data' => $product]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)

    {
        $product->name = $request->name;
        $product->title = $request->title;
        $product->save();


        return response()->json([
            'message' => 'Product Updated',
            'status' => 'success',
            'data' => $product
        ]);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)

    {
        $product->delete();
        return response()->json([
            'message'=>'Successfully deleted'
        ]);
        //
    }
}

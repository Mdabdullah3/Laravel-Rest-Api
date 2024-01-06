<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $products = product::with(['category', 'subCategory', 'size', 'user', 'pictures'])->get();
        return response()->json([
            'status' => 'Success',
            'code' => 200,
            'data' => $products
        ]);
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
    public function store(StoreproductRequest $request)
    {
        $productData = $request->validated();
        $product = Product::create($productData);

        // Handle pictures upload if needed

        return response()->json(['message' => 'Product created successfully', 'data' => $product], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        return response()->json(['data' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, product $product)
    {
        $productData = $request->validated();
        $product->update($productData);

        // Handle pictures update if needed

        return response()->json(['message' => 'Product updated successfully', 'data' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}

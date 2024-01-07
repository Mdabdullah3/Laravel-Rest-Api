<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Picture;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $products = Product::with(['category', 'subCategory', 'size', 'user', 'picture'])->get();
        return response()->json([
            'status' => 'Success',
            'code' => 200,
            'data' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreproductRequest $request)
    {
        $productData = $request->validated();
        // Create the product
        $product = Product::create($productData);
        // Handle pictures upload
        $uploadedImages = $request->input('images');

        if ($uploadedImages) {
            foreach ($uploadedImages as $image) {
                $base64Image = $image['image'];
                $decodedImage = base64_decode($base64Image);
                $fileName = time() . '_' . $image['filename'];
                $filePath = 'uploads/' . $fileName;
                // Save the image file
                file_put_contents(public_path($filePath), $decodedImage);
                // Create a new Picture instance
                $picture = new Picture(['path' => $filePath]);
                $product->pictures()->save($picture);
            }
        }

        return response()->json(['message' => 'Product created successfully', 'data' => $product], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product) // Correct the case of the model name
    {
        $product->load(['category', 'subCategory', 'size', 'user', 'pictures']); // Use the correct relationship name 'pictures'
        return response()->json([
            'status' => 'Success',
            'data' => $product
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product) // Correct the case of the model name
    {
        $productData = $request->validated();
        $product->update($productData);

        // Handle pictures update if needed

        return response()->json(['message' => 'Product updated successfully', 'data' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) // Correct the case of the model name
    {
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}

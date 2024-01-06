<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use Illuminate\Http\Client\Request;
use Illuminate\Http\JsonResponse;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $subCategories = SubCategory::all();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $subCategories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubCategoryRequest $request): JsonResponse
    {
        $subCategory = SubCategory::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'SubCategory created successfully',
            'data' => $subCategory,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        $subCategory = SubCategory::find($id);
        if (!$subCategory) {
            return response()->json([
                'status' => 'No Data Found',
                'code' => '404',
            ]);
        } else {
            return response()->json([
                'status' => 'success',
                'data' => $subCategory,
            ]);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
        ]);
        return  $subCategory->update($request->all());
    }



    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        return response()->json('Successfully Deleted Sub Category', 204);
    }
}

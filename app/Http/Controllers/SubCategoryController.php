<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
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
    public function show(SubCategory $subCategory): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => $subCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory): JsonResponse
    {
        $subCategory->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'SubCategory updated successfully',
            'data' => $subCategory,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory): JsonResponse
    {
        $subCategory->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'SubCategory deleted successfully',
        ]);
    }
}

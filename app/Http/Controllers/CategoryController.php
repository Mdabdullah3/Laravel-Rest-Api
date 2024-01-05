<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use Illuminate\Http\Client\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return category::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecategoryRequest $request)
    {
        return category::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        return category::find($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json(['message' => 'Category updated successfully', 'category' => $category]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}

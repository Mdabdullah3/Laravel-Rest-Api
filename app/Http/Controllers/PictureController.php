<?php

namespace App\Http\Controllers;

use App\Models\picture;
use App\Http\Requests\StorepictureRequest;
use App\Http\Requests\UpdatepictureRequest;
use Illuminate\Http\JsonResponse;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $picture = picture::all();
        return response()->json([
            'status' => 'success',
            'data' => $picture
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
    public function store(StorepictureRequest $request): JsonResponse
    {
        $picture = picture::create($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $picture
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(picture $picture)
    {
        $picture = picture::find($picture);
        return response()->json([
            'status' => 'success',
            'data' => $picture
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepictureRequest $request, picture $picture)
    {
        $picture->update($request->validated());
        $picture->refresh();
        return response()->json([
            'status' => 'success',
            'message' => 'Picture updated successfully',
            'data' => $picture
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(picture $picture)
    {
        $picture->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Picture deleted successfully',
            'data' => $picture
        ]);
    }
}

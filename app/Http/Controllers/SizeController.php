<?php

namespace App\Http\Controllers;

use App\Models\size;
use App\Http\Requests\StoresizeRequest;
use App\Http\Requests\UpdatesizeRequest;
use Illuminate\Http\JsonResponse;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $size =  size::all();
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $size
        ]);
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
    public function store(StoresizeRequest $request)
    {
        $size = size::create($request->all());
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $size,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(size $size)
    {
        $size = size::find($size);
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => $size,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(size $size)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesizeRequest $request, size $size)
    {
        $size->update($request->validated());
        return response()->json([
            'message' => 'Size updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(size $size)
    {
        $size->delete();
        return response()->json([
            'status' => 'Successfully',
            'message' => 'Size deleted successfully'
        ]);
    }
}

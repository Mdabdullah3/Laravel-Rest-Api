<?php

namespace App\Http\Controllers;

use App\Models\picture;
use App\Http\Requests\StorepictureRequest;
use App\Http\Requests\UpdatepictureRequest;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function store(StorepictureRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(picture $picture)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(picture $picture)
    {
        //
    }
}

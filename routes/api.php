<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('users', UserController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('subcategories', SubCategoryController::class);
Route::apiResource('sizes', SizeController::class);
Route::apiResource('picture', PictureController::class);
Route::apiResource('products', ProductController::class);


// Not Found Route 
Route::fallback(function (Request $request) {
    return response()->json([
        'message' => 'Not Found',
        'code' => 404,
    ], 404);
});

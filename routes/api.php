<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\Auth\AuthenticationController;
//products

//create product
Route::post('/products', [ProductController::class, 'createProduct']);
//read all products
Route::get('/products', [ProductController::class, 'getAllProducts']);
//read one product
Route::get('/product', [ProductController::class,'getProduct']);
//update product
Route::put('/product', [ProductController::class,'updateProduct']);
//delete product
Route::delete('/product', [ProductController::class,'deleteProduct']);


//suppliers

//create supplier
Route::post('/supplier', [SupplierController::class, 'createSupplier']);
//read all
Route::get('/suppliers', [SupplierController::class, 'getAllSuppliers']);
//read one
Route::get('/supplier', [SupplierController::class, 'getSupplier']);
//update
Route::put('/supplier', [SupplierController::class, 'updateSupplier']);
//delete
Route::delete('/supplier', [SupplierController::class, 'deleteSupplier']);

/**
 * Register, Login, Logout
 * 
 */
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/logout', [AuthenticationController::class, 'login']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

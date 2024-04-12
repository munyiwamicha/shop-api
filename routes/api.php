<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * CRUD Routes for Products
 * 
 */
//Create
Route::post("/", [ProductController::class,"createProduct"]);

//Read
Route::get("/products",[ProductController::class,'getAllProducts']);
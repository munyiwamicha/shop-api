<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductController extends Controller
{
    //
    /**
     * 
     * 
     * 
     */
    function createProduct(Request $request){

        //validate
        $request->validate([
            "name"=>'required',
            "description"=>'required', 
            "skuNumber"=>'required',
            "category"=>'required',
            "supplier"=>'required',
            "numberAvailable"=>'required',
            "price=>'required'"
        ]);

        //create the record in the DB
        //$product = Product::create([]);
        // create the record in the DB
        $product = ProductModel::create([
            'name' => $request->name,
            'description' => $request->description,
            'skuNumber' => $request->skuNumber,
            'category' => $request->category,
            'supplier' => $request->supplier,
            'numberAvailable' => $request->numberAvailable,
            'price' => $request->price,
        ]);

        // connfirm whether it exists in DB
        $product = ProductModel::find($product->id);
        if ($product) {
            return response(
                [
                    'message' => 'success',
                    'product' => $product, 
                ]
            );
        } else {
            return response(
                [
                    'message' => 'success', 
                    'product' => 'product does not exists',
                ]
            );
        }

        

    }
    //0read one product by ID.

    function readProduct($id)
    {
        $product = ProductModel::find($id);
        if ($product) {
            return response([
                'message' => 'success',
                'product' => $product,
            ]);
        } else {
            return response([
                'message' => 'error', 
                'product' => 'Product not found',
            ]);
        }
    }

    /**
     * Read all products.
     */
    function readAllProducts()
    {
        $products = ProductModel::all();
        return response([
            'message' => 'success',
            'products' => $products,
        ]);
    }

    /**
     * Update a product.
     */
    function updateProduct(Request $request, $id)
    {
        // Validate request data
        $request->validate([
            "name" => 'required',
            "description" => 'required', 
            "skuNumber" => 'required',
            "category" => 'required',
            "supplier" => 'required',
            "numberAvailable" => 'required',
            "price" => 'required'
        ]);

        // Find the product by ID
        $product = ProductModel::find($id);
        if (!$product) {
            return response([
                'message' => 'error', 
                'product' => 'Product not found',
            ]);
        }

        // Update the product record
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'skuNumber' => $request->skuNumber,
            'category' => $request->category,
            'supplier' => $request->supplier,
            'numberAvailable' => $request->numberAvailable,
            'price' => $request->price,
        ]);

        return response([
            'message' => 'success',
            'product' => $product,
        ]);
    }

    /**
     * Delete a product.
     */
    function deleteProduct($id)
    {
        $product = ProductModel::find($id);
        if (!$product) {
            return response([
                'message' => 'error', 
                'product' => 'Product not found',
            ]);
        }

        $product->delete();

        return response([
            'message' => 'success',
            'product' => 'Product deleted successfully',
        ]);
    }


}

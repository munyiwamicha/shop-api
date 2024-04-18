<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductController extends Controller
{
    //CRUD

    //create product
    function createProduct(Request $request){

        //validatation
        $request->validate([
            "name"=>'required',
            "description"=>'required', 
            "skuNumber"=>'required',
            "category"=>'required',
            "product"=>'required',
            "quantity"=>'required',
            "price=>'required'"
        ]);

        //create the record in the DB
        $product = ProductModel::create([
            'name' => $request->name,
            'description' => $request->description,
            'skuNumber' => $request->skuNumber,
            'category' => $request->category,
            'product' => $request->product,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        //confirm whether it exists in DB
        $product = ProductModel::find($product->id);
        if ($product) {
            return response(
                [
                    'message' => 'success',
                    'product' => $product,
                    'status' => 200 
                ]
            );
        } else {
            return response(
                [
                    'message' => 'success', 
                    'product' => 'product does not exists',
                    'status' => 404
                ]
            );
        }

        

    }

    //read all products
    function getAllProducts(){

        //validatatiom
        // request
        $product = ProductModel::all();
    
        // return to user
        if ($product) {
            return response(
                [
                    'message' => 'Success',
                    'product' => $product,
                    'status'=> 200
                ]
            );
        } else {
            return response(
                [
                    'message' => 'Success',
                    'product' => 'Error!',
                    'status'=> 404
                ]
            );
        }
    }


    //read one Product
    function getProduct($id){
        //request
        $product = ProductModel::find($id);

        //response
        if ($product) {
            return response([
                'message' => 'success',
                'product' => $product,
                'status'=> 200
            ]);
        } else {
            return response([
                'message' => 'error', 
                'product' => 'product not found',
                'status'=> 404
            ]);
        }
    }


    //update product
    function updateProduct(Request $request){

        //validate
        $request->validate([
            "name"=>'required',
            "description"=>'required', 
            "skuNumber"=>'required',
            "category"=>'required',
            "product"=>'required',
            "quantity"=>'required',
            "price=>'required'"
        ]);
        //request
        // override the values and save
        $product = ProductModel::find($request->id);

        // if the reord exists
        if ($product) {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->skuNumber = $request->skuNumber;
            $product->category = $request->category;
            $product->product = $request->product;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->save();// updates the record

            //response
            return response([
                'message' => 'success',
                'productDetails' => $product,
                'status'=> 200

            ]);

        } else {
            return response([
                'message' => 'success',
                'productDetails' => 'product does not exist!',
                'status'=> 404
            ]);
        }
    }

    //delete product
    function deleteProduct(Request $request)
    {
        //validate
        $request->validate(['id' => 'required']);

        // check whether product exists
        $product = ProductModel::find($request->id);

        if ($product) {
            $product->delete();
            return response([
                'message' => 'success',
                'productDetails' => 'product has been deleted!',
                'status'=> 200
            ]);
        } else {
            return response([
                'message' => 'success',
                'productDetails' => 'product does not exist',
                'status'=> 404
            ]);
        }

    }









}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        //return a user response

    }


}

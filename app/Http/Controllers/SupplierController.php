<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SupplierModel;

class SupplierController extends Controller
{
    //CRUD


    //create supplier record
    function createSupplier(Request $request)
    {
        //validate 
        $request->validate([
            'name' => 'required',
            'product_category' => 'required',
            'product_name' => 'required',
            'product_origin' => 'required',
            'manufacturer' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        $supplier = SupplierModel::create([
            'name' => $request->name,
            'product_category' => $request->product_category,
            'product_name' => $request->product_name,
            'product_origin' => $request->product_origin,
            'manufacturer' => $request->manufacturer,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        $supplier = SupplierModel::find($supplier->id);

        //response
        if ($supplier) {
            return response([
                'message' => 'success',
                'supplier' => $supplier,
                'status' => 200
            ]);
        } else {
            return response([
                'message' => 'error',
                'supplier' => 'does not exist',
                'status' => 404,
            ]);
        }
    }

    //read all records for supplier
    function getAllSuppliers()
    {
        //request
        $suppliers = SupplierModel::all();

        //response
        if ($suppliers) {
            return response(
                [
                    'message' => 'Success',
                    'suppliers' => $suppliers,
                    'status'=> 200
                ]
            );
        } else {
            return response(
                [
                    'message' => 'Success',
                    'suppliers' => 'no suppliers yet!',
                    'status'=> 404
                ]
            );
        }
    }

    //read record for supplier
    function getSupplier(Request $request)
    {
        //validation
        $request->validate(['id' => 'required']);
        // get instanc from DB
        $supplier = SupplierModel::find($request->id);
        //response
        if ($supplier) {
            return response(
                [
                    'message' => 'Success',
                    'suppliers' => $supplier,
                    'status'=> 200
                ]
            );
        } else {
            return response(
                [
                    'message' => 'Success',
                    'suppliers' => 'supplier does not exist!',
                    'status'=> 404
                ]
            );
        }
    }

    //update supplier
    function updateSupplier(Request $request)
    {
        //validation
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'product_category' => 'required',
            'product_name' => 'required',
            'product_origin' => 'required',
            'manufacturer' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);
        //request
        $supplier = SupplierModel::find($request->id);

        //if the supplier exists
        if ($supplier) {
            $supplier->name = $request->name;
            $supplier->product_category = $request->product_category;
            $supplier->product_name = $request->product_name;
            $supplier->product_origin = $request->product_origin;
            $supplier->manufacturer = $request->manufacturer;
            $supplier->quantity = $request->quantity;
            $supplier->price = $request->price;
            $supplier->save(); //updates record

            //response
            return response([
                'message' => 'success',
                'supplierDetails' => $supplier,
                'status'=> 200
            ]);

        } else {
            return response([
                'message' => 'success',
                'supplierDetails' => 'supplier does not exist!',
                'status'=> 404
            ]);
        }
    }


    //delete record
    function deleteSupplier(Request $request)
    {
        //validation
        $request->validate(['id' => 'required']);

        //request
        $supplier = SupplierModel::find($request->id);

        //response
        if ($supplier) {
            $supplier->delete();
            return response([
                'message' => 'success',
                'supplierDetails' => 'supplier has been deleted!',
                'status'=> 200
            ]);
        } else {
            return response([
                'message' => 'success',
                'supplierDetails' => 'upplier does not exist',
                'status'=> 404
            ]);
        }

    }
}

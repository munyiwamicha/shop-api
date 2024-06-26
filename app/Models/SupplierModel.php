<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    use HasFactory;
    protected $table = "supplier";

    protected $fillable = [
        'name',
        'product_category',
        'product_name',
        'product_origin',
        'manufacturer',
        'quantity',
        'price'
    ]; 
}

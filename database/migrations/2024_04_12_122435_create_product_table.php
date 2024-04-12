<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('name');
            $table->longText('description'); 
            $table->string('skuNumber'); 
            $table->string('category');
            $table->string('supplier');
            $table->string('numberAvailable');
            $table->float('price');
            $table->timestamps(); //updated and created at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};

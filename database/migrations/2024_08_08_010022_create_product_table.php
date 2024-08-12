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
        Schema::create('products', function (Blueprint $table) {
            $table->id('productid'); // Primary key with custom name 'productid'
            $table->string('name');    
            $table->text('description'); // Use 'text' for potentially longer descriptions
            $table->string('image1')->nullable(); // Allow image fields to be nullable if not always required
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->integer('stock')->unsigned(); // Unsigned integer for stock, as it should not be negative
            $table->decimal('price', 8, 2); // Decimal with precision and scale for price (e.g., 999,999.99)
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
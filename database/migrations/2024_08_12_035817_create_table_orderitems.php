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
        Schema::create('orderitems', function (Blueprint $table) {
            $table->id('orderitemsid');
            $table->unsignedBigInteger('orderid');
            $table->unsignedBigInteger('productid');
            $table->integer('quantity');
            $table->decimal('price', 8,2 );
            $table->decimal('totalprice', 8,2 );
            $table->timestamps();

            $table->foreign('orderid')->references('orderid')->on('orders')->onDelete('cascade');
            $table->foreign('productid')->references('productid')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderitems');
    }
};
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('orderid');
            $table->string('userid');
            $table->unsignedBigInteger('purchaseid');
            $table->timestamp('order_date');
            $table->string('orderstatus');
            $table->timestamps();

            $table->foreign('userid')->references('userid')->on('users')->onDelete('cascade');
            $table->foreign('purchaseid')->references('purchaseid')->on('purchases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
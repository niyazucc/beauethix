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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id('purchaseid');
            $table->string('userid');
            $table->decimal('total', 8, 2);
            $table->timestamp('date')->useCurrent();
            $table->string('trackingno');
            $table->string('fname');
            $table->string('shippingadress1');
            $table->string('shippingadress2');
            $table->string('shippingcity');
            $table->string('shippingstate');
            $table->integer('shippingzip');
            $table->string('shippingcountry');
            $table->string('phonenum');
            $table->string('providerlabel');
            $table->string('status');
            $table->timestamps();

            $table->foreign('userid')->references('userid')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
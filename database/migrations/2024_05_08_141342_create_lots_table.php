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
        Schema::create('lots', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->date('expiration_date');
            $table->double('price', 8, 2);
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('supplier_id');
            $table->foreignId('lot_product_id')->constrained(
                table: 'products', column: 'id'
            )->onDelete('cascade');
            $table->foreignId('lot_supplier_id')->constrained(
                table: 'suppliers', column: 'id'
            )->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lots');
    }
};

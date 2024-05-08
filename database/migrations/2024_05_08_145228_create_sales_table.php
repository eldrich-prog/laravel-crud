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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->double('total', 8, 2);
            $table->string('payment_method');
            $table->foreignId('sales_product_id')->constrained(
                table: 'products', column: 'id'
            )->onDelete('cascade');
            $table->foreignId('sales_employee_id')->constrained(
                table: 'employees', column: 'id'
            )->onDelete('cascade');
            $table->foreignId('sales_ticket_id')->constrained(
                table: 'tickets', column: 'id'
            )->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};

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
            $table->id();
            $table->string('order_number')->unique();

            // Customer info (no sensitive card data)
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_mobile');
            $table->string('customer_cnic')->nullable();

            $table->string('billing_address')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('billing_postal_code')->nullable();

            // Amounts
            $table->decimal('subtotal', 10, 2);
            $table->decimal('total', 10, 2);

            // Order status: pending, paid, failed, cancelled
            $table->string('status')->default('pending');

            // PayFast metadata (non-sensitive)
            $table->string('payfast_transaction_id')->nullable();
            $table->string('payfast_status_code')->nullable();
            $table->string('payfast_status_message')->nullable();
            $table->json('payfast_meta')->nullable();

            $table->timestamps();
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

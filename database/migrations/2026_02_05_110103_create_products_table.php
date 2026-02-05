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
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            // JSON field to store an array of bullet list items (optional, dynamic length)
            $table->json('bullet_points')->nullable();
            // Required main product image (stored as path / filename)
            $table->string('image');
            // Optional secondary image used in tables or listings
            $table->string('table_image')->nullable();
            // Base price (required)
            $table->decimal('price', 10, 2);
            // Optional sale price; when present, show original price cut and this as sale
            $table->decimal('sale_price', 10, 2)->nullable();
            // Whether the product is featured and should appear under Popular Products
            $table->boolean('is_featured')->default(false);
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id(); // Auto-incrementing ID
        $table->string('name'); // Product name
        $table->text('description')->nullable(); // Optional description
        $table->decimal('price', 10, 2); // Product price
        $table->unsignedBigInteger('category_id'); // Foreign key to categories
        $table->string('image')->nullable(); // Image path/filename (nullable, in case no image is uploaded)
        $table->timestamps(); // Created_at and updated_at

        // Define the foreign key constraint
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('restrict');
            $table->foreignId('category_id')->constrained()->onDelete('restrict');
            $table->foreignId('subCategory_id')->constrained('sub_categories')->onDelete('restrict');
            $table->string('name');
            $table->text('description');
            $table->integer('quantity');
            $table->decimal('sprice', 8, 2);
            $table->decimal('pprice', 8, 2);
            $table->decimal('discount', 8, 2)->nullable();
            $table->foreignId('size_id')->constrained('sizes')->onDelete('restrict');
            // Remove the following line
            $table->foreignId('picture_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}

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
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('restrict');
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('subCategory_id')->nullable()->constrained('sub_categories')->onDelete('restrict');
            $table->string('name')->default('');
            $table->text('description')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('sprice', 8, 2)->nullable();
            $table->decimal('pprice', 8, 2)->nullable();
            $table->decimal('discount', 8, 2)->nullable();
            $table->foreignId('size_id')->nullable()->constrained('sizes')->onDelete('restrict');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}

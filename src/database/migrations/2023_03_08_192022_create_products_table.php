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

            $table->boolean('is_active')->default(FALSE);
            
            $table->foreignId('category_id')->constrained('product_categories');

            $table->unsignedTinyInteger('stock')->default(0);

            $table->string('name');
            $table->text('description');

            $table->string('identifier', 13)->unique();

            $table->decimal('price', 10, 2)->nullable();

            $table->json('details')->nullable();

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

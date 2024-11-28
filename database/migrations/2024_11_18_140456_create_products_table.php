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

            $table->string('name');
            $table->decimal('price', 10,places: 2)->default(0);
            $table->unsignedTinyInteger('qty')->default(0); // value will note more then 65k

            $table->enum('size', ['small','medium', 'large'])->default('medium');
            $table->enum('color', ['red','blue', 'grenn'])->default('blue');
            $table->enum('status', ['active','inactive'])->default('active');

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

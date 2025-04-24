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
            $table->string('title', 20);
            $table->decimal('price', 8, 2);
            $table->text('description');
            $table->foreignId('category_id');
<<<<<<< HEAD
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
=======
            $table->foreignId('user_id') ;
>>>>>>> 9b2ebbcf53d4bce5273268b578d488209fe3f0e6
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

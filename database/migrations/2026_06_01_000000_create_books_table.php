<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('genre');        // Fiction, Non-Fiction, Science-Fiction, Fantasy, Mystère
            $table->string('age_range');     // -3ans, 3-6ans, 6-10ans, 10-15ans, 15-18ans, +18ans
            $table->decimal('price', 8, 2)->default(0);
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

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
        Schema::create('posts', function (Blueprint $table) {
             $table->id();
             $table->string('title');
             $table->string('slug')->unique();
             $table->string('filepath');
             $table->foreignId('author_id')->constrained('authors')->onDelete('cascade');
             $table->enum('status', ['draft', 'published'])->default('draft'); // Added status field
             $table->softDeletes(); // Added softDeletes
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

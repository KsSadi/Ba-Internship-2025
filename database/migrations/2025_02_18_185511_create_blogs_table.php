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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Blog Title (required)
            $table->string('author')->nullable(); // Author (optional)
            $table->text('summary')->nullable(); // Summary (optional)
            $table->string('category')->nullable(); // Category (optional)
            $table->longText('content'); // Blog Content (required)
            $table->string('tags')->nullable(); // Tags (optional, comma-separated)
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};

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
            $table->id('id');
            $table->string('title');
            $table->text('slug')->unique();
            $table->longText('content');
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->integer('view_count')->default(1);
            $table->integer('likes_count')->default(0);
            $table->string('tags')->nullable();
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

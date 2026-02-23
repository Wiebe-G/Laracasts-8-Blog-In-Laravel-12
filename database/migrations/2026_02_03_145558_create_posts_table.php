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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
			$table->string('title');
            $table->string('slug')->unique();
			$table->string('thumbnail')->nullable();
            $table->text('excerpt');
            $table->text('body');
			$table->boolean('published')->default(false);
			$table->unsignedBigInteger('likes')->default(0);
			$table->unsignedBigInteger('views_count')->default(0);
            $table->timestamps();
            $table->timestamp('published_at')->useCurrent();
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

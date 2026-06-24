<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category');
            $table->text('description');
            $table->string('duration');
            $table->decimal('price', 10, 2);
            $table->string('image')->nullable();
            $table->decimal('rating', 2, 1)->default(0);
            $table->text('inclusions')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};

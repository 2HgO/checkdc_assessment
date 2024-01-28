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
        Schema::create('stories', function (Blueprint $table) {
          $table->integer('id');
          $table->string('by');
          $table->integer('score');
          $table->longText('text')->nullable();
          $table->integer('time');
          $table->text('title');
          $table->text('url')->nullable();
          $table->enum('category', ['job', 'story']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};

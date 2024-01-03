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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->float('serial');
            $table->string('title');
            $table->longText('description')->nullable();
//            $table->unsignedBigInteger('likes')->default(0);
//            $table->unsignedBigInteger('dislikes')->default(0);
            $table->unsignedBigInteger('chapter_id');
            $table->string('slug');
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};

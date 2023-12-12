<?php

use App\Constants\Status;
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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->enum('type', ['video', 'article', 'book', 'other']);
            $table->string('url');
            $table->foreign('user_id')->references('id')->on('admins')->onDelete('cascade');
            $table->string('status')->default(Status::DRAFT);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::table('resources', function (Blueprint $table) {
//            $table->dropForeign(['user_id']);
//            $table->dropIfExists('resources');
//        });

        Schema::dropIfExists('resources');

    }
};

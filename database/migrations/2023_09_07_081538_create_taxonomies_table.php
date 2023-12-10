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
        Schema::create('taxonomies', function (Blueprint $table) {
            $table->id();
            $table->enum('content_type', ['article', 'video', 'book']);
            $table->foreignId('user_id')->constrained('users');
            $table->string('taxonomy_name');
            $table->string('taxonomy_slug');
            $table->string('image');
            $table->string('status')->default(Status::DRAFT);
//            $table->string('mime_type');
//            $table->string('file_location');
            $table->string('link');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxonomies');
    }
};

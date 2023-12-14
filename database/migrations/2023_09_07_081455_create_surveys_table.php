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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('onboarding_id')->constrained('onboardings');
            $table->foreignId('option_id')->constrained('options');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::table('surveys', function (Blueprint $table) {
//            $table->dropForeign(['question_id']);
//            $table->dropForeign(['option_id']);
//            $table->dropForeign(['user_id']);
//            $table->dropIfExists();
//        });
        Schema::dropIfExists('surveys');
    }
};

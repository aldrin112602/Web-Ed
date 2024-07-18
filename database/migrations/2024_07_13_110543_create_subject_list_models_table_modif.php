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
        Schema::create('subject_models', function (Blueprint $table) {
            $table->id();
            $table->string('subject')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->string('time')->nullable();
            $table->timestamps();


            // Add the foreign key constraint
            $table->foreign('teacher_id')->references('id')->on('teacher_accounts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_models');
    }
};

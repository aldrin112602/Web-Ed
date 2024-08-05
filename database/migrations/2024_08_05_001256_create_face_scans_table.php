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
        Schema::create('face_scans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->time('time');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('student_accounts')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('face_scans');
    }
};

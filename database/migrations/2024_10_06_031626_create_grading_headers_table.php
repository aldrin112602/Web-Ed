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
        Schema::create('grading_headers', function (Blueprint $table) {
            $table->id();
            $table->string('region')->default('IV - A')->nullable();
            $table->string('division')->default('2nd')->nullable();
            $table->string('school_name')->default('Ark Technological Institute Education System Inc')->nullable();
            $table->string('school_id')->default('405210')->nullable();
            $table->string('school_year')->default('2023-2024')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grading_headers');
    }
};

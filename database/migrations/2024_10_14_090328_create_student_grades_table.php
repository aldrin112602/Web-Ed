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
        Schema::create('student_grades', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_id');
            $table->integer('student_id');
            $table->integer('grade');
            $table->string('strand');
            $table->string('section');

            // For Written Work
            $table->integer('written_1')->nullable();
            $table->integer('written_2')->nullable();
            $table->integer('written_3')->nullable();
            $table->integer('written_4')->nullable();
            $table->integer('written_5')->nullable();
            $table->integer('written_6')->nullable();
            $table->integer('written_7')->nullable();
            $table->integer('written_8')->nullable();
            $table->integer('written_9')->nullable();
            $table->integer('written_10')->nullable();

            // For Performance Task
            $table->integer('task_1')->nullable();
            $table->integer('task_2')->nullable();
            $table->integer('task_3')->nullable();
            $table->integer('task_4')->nullable();
            $table->integer('task_5')->nullable();
            $table->integer('task_6')->nullable();
            $table->integer('task_7')->nullable();
            $table->integer('task_8')->nullable();
            $table->integer('task_9')->nullable();
            $table->integer('task_10')->nullable();

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_grades');
    }
};
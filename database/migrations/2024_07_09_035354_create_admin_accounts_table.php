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
        Schema::create('admin_accounts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_number')->unique();
            $table->string('name');
            $table->string('gender');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique()->nullable();
            $table->string('position')->nullable();
            $table->string('role')->default('Admin')->nullable();
            $table->text('profile')->nullable();
            $table->string('phone_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_accounts');
    }
};

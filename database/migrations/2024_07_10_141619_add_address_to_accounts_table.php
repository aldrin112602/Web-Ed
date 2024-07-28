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

        Schema::table('teacher_accounts', function (Blueprint $table) {
            $table->string('address')->nullable()->after('phone_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admin_accounts', function (Blueprint $table) {
            $table->dropColumn('address');
        });
        Schema::table('student_accounts', function (Blueprint $table) {
            $table->dropColumn('address');
        });
        Schema::table('guidance_accounts', function (Blueprint $table) {
            $table->dropColumn('address');
        });
        Schema::table('teacher_accounts', function (Blueprint $table) {
            $table->dropColumn('address');
        });
    }
};

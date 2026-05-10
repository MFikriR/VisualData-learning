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
        Schema::table('users', function (Blueprint $table) {
            // Kolom untuk menyimpan path foto (nullable karena di awal belum punya foto)
            $table->string('profile_photo_path', 2048)->nullable()->after('email');
            // Kolom untuk jenis kelamin (menggunakan enum agar datanya konsisten)
            $table->enum('gender', ['male', 'female'])->nullable()->after('profile_photo_path');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['profile_photo_path', 'gender']);
        });
    }
};

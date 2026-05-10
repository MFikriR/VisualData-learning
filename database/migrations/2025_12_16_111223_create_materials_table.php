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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chapter_id')->constrained()->onDelete('cascade');
            $table->string('title'); 
            $table->string('slug')->unique(); 
            $table->longText('content'); 
            
            // --- PERBAIKAN 1: UBAH ENUM JADI STRING ---
            // Agar bisa menerima jenis 'simulation_jenis_data', 'simulation_labeling', dll tanpa error.
            $table->string('type')->default('text'); 
            
            // --- PERBAIKAN 2: TAMBAHKAN MIN_LEVEL ---
            // Wajib ada karena di seeder kamu memasukkan data 'min_level'.
            $table->integer('min_level')->default(0);

            $table->integer('sequence'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
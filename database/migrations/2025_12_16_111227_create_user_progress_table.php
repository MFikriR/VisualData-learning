<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // KITA GUNAKAN NAMA TABEL BARU: 'learning_progress'
        Schema::create('learning_progress', function (Blueprint $table) {
            $table->id();
            
            // 1. Kolom User (Wajib)
            $table->unsignedBigInteger('user_id');

            // 2. Kolom Referensi (Boleh Null salah satu)
            // material_id boleh kosong jika ini adalah progress kuis
            $table->unsignedBigInteger('material_id')->nullable(); 
            // quiz_id boleh kosong jika ini adalah progress materi bacaan
            $table->unsignedBigInteger('quiz_id')->nullable();     

            // 3. Status & Nilai
            $table->boolean('is_completed')->default(false);
            $table->integer('score')->nullable(); // Untuk menyimpan nilai kuis
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            // 4. Foreign Keys (Constraint)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_progress');
    }
};
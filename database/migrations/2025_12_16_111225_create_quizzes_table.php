<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            
            // 🔥 INI KUNCINYA: Tambahkan ->nullable() agar Pre-Test & Post-Test (yang tidak punya bab) bisa masuk ke database
            $table->foreignId('chapter_id')->nullable()->constrained()->onDelete('cascade');
            
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('type')->default('normal'); // 'normal', 'pre_test', 'post_test'
            $table->integer('time_limit')->default(0); // Menit
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
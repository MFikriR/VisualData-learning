<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guarded = []; // Izinkan pengisian data massal

    // Relasi: Satu Kuis punya banyak Soal
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // Relasi: Kuis milik Bab tertentu
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    // ==========================================
    // TAMBAHAN BARU (UNTUK DASHBOARD GURU)
    // ==========================================
    
    // Relasi: Satu Kuis memiliki banyak Riwayat Pengerjaan (Attempts)
    public function attempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $guarded = []; // Izinkan semua kolom diisi

    // Relasi: Satu Bab punya banyak Materi (Diurutkan)
    public function materials()
    {
        return $this->hasMany(Material::class)->orderBy('sequence');
    }

    // ==========================================
    // 🔥 TAMBAHAN BARU (WAJIB ADA)
    // ==========================================
    // Relasi: Satu Bab punya BANYAK Kuis (Latihan, Evaluasi, Ujian, dll)
    // Fungsi inilah yang akan kita panggil di Controller nanti ($chapter->quizzes)
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    // ==========================================
    // KODE LAMA (TETAP PERTAHANKAN)
    // ==========================================
    // Relasi: Khusus mengambil satu Kuis Akhir (Final) saja
    // (Mungkin kode lama Anda masih butuh ini untuk logika 'Ujian Akhir Bab')
    public function quiz()
    {
        return $this->hasOne(Quiz::class)->where('type', 'final');
    }
}
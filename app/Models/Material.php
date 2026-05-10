<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    // 1. Izinkan pengisian data massal (judul, konten, dll)
    protected $guarded = [];

    // 2. Relasi: Materi milik satu Bab
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    // 3. Relasi: Materi memiliki banyak data Progress Siswa
    // (PENTING UNTUK MENAMPILKAN CENTANG HIJAU ✅ NANTI)
    public function progress()
    {
        return $this->hasMany(UserProgress::class);
    }

    /**
     * Helper: Ambil ID Youtube dari URL panjang
     * Agar bisa di-embed di iframe
     */
    public function getYoutubeEmbedUrlAttribute()
    {
        if ($this->type !== 'video' || !$this->video_url) {
            return null;
        }

        // Regex sederhana untuk mengambil ID video dari URL Youtube
        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $this->video_url, $matches);

        // Jika ketemu ID-nya, kembalikan URL embed
        return isset($matches[1]) ? 'https://www.youtube.com/embed/' . $matches[1] : $this->video_url;
    }
}
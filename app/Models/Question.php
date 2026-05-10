<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    // Pastikan guarded kosong agar semua kolom (option_a, option_b, dll) bisa diisi
    protected $guarded = []; 

    // Relasi: Soal milik Kuis
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    // ❌ HAPUS atau Matikan fungsi options() ini
    // Karena tabel 'options' TIDAK ADA di database Anda.
    // public function options() { return $this->hasMany(Option::class); }
}
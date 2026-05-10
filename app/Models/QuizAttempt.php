<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    use HasFactory;

    // 1. Izinkan semua data disimpan (termasuk score dan answers)
    protected $guarded = ['id'];

    // 2. Casting Otomatis (PENTING)
    // Ini mengubah JSON di database menjadi Array PHP saat diambil
    protected $casts = [
        'answers' => 'array', 
        'score'   => 'float', // Agar nilai desimal (87.5) terbaca benar
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
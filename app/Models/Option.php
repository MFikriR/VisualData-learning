<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $guarded = []; // ✅ Aman untuk simpan 'option_text', 'is_correct'

    // Relasi: Opsi milik Soal
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
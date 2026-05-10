<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProgress extends Model
{
    // Arahkan ke nama tabel yang baru
    protected $table = 'learning_progress'; 
    
    protected $guarded = []; 

    // Relasi (Opsional, untuk mempermudah akses nanti)
    public function material() {
        return $this->belongsTo(Material::class);
    }

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }
}
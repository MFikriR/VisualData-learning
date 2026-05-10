<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'kelas', 
        'xp',
        'profile_photo_path', 
        'gender',            
    ];

    // Tambahkan helper kecil untuk cek role (opsional tapi berguna)
    public function isTeacher()
    {
        return $this->role === 'teacher';
    }
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'xp' => 'integer', 
        ];
    }

    /**
     * Hitung Level berdasarkan XP (Rumus: 100 XP = 1 Level)
     * Level 1: 0-99 XP
     * Level 2: 100-199 XP
     * dst.
     */
    public function getLevelAttribute()
    {
        // Jika XP null (user baru), anggap 0
        $currentXp = $this->xp ?? 0;
        return floor($currentXp / 100) + 1;
    }

    /**
     * Hitung Nama Pangkat (Badge) berdasarkan Level
     */
    public function getRankLabelAttribute()
    {
        $level = $this->level;
        
        if ($level <= 1) return 'Pemula Data';
        if ($level <= 3) return 'Explorer';
        if ($level <= 5) return 'Analyst Junior';
        if ($level <= 9) return 'Data Scientist';
        return 'Master AI';
    }

    /**
     * Hitung persentase progress menuju level berikutnya (0-100%)
     */
    public function getLevelProgressAttribute()
    {
        $currentXp = $this->xp ?? 0;
        // Sisa XP setelah dibagi 100. Contoh: 150 XP -> Sisa 50 (50% menuju level 3)
        return $currentXp % 100;
    }

    // ==========================================
    // ACCESSOR FOTO PROFIL
    // ==========================================
    
    /**
     * Mendapatkan URL Foto Profil.
     * Jika user upload foto -> Tampilkan foto itu.
     * Jika tidak -> Tampilkan avatar inisial otomatis.
     */
    public function getProfilePhotoUrlAttribute()
    {
        // 1. Cek apakah ada file foto di database
        if ($this->profile_photo_path) {
            // Kembalikan URL lengkap ke folder storage
            return asset('storage/' . $this->profile_photo_path);
        }

        // 2. Fallback: Gunakan UI Avatars (Inisial Nama)
        $name = urlencode($this->name);
        return 'https://ui-avatars.com/api/?name=' . $name . '&color=7F9CF5&background=EBF4FF';
    }

    // ==========================================
    // RELASI DATABASE (WAJIB ADA UNTUK LEADERBOARD)
    // ==========================================

    /**
     * Relasi: Satu User memiliki banyak UserProgress
     * Digunakan untuk menghitung 'Top Progress' di Leaderboard
     */
    public function progress()
    {
        return $this->hasMany(UserProgress::class, 'user_id');
    }

    // ==========================================
    // TAMBAHAN BARU (UNTUK HALAMAN GURU)
    // ==========================================

    /**
     * Relasi: User memiliki banyak percobaan kuis
     * Digunakan di halaman Detail Siswa (Teacher Dashboard)
     */
    public function quizAttempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }

}
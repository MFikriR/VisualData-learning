<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat User Siswa Default
        User::firstOrCreate(
            ['email' => 'fikri@gmail.com'], 
            [
                'name' => 'Fikri',
                'password' => bcrypt('fikri123'),
                'email_verified_at' => now(),
                'role' => 'student',
                'kelas' => '11-1',
                'gender' => 'male',
            ]
        );

        // 2. Buat User Bypass / Demo (Seluruh Materi & Kuis Terbuka)
        User::firstOrCreate(
            ['email' => 'bypass@gmail.com'], 
            [
                'name' => 'Akun Demo (Unlocked)',
                'password' => bcrypt('password123'),
                'email_verified_at' => now(),
                'role' => 'student',
                'kelas' => '11-1',
                'gender' => 'male',
            ]
        );

        // 3. Panggil Semua Seeder Sekaligus
        $this->call([
            ContentSeeder::class,             // Memuat Bab 1, 2, 3 dsb.
            TeacherSeeder::class,             // Memuat Akun Guru
            UjiKompetensiAkhirSeeder::class,  // Memuat Uji Kompetensi
            PrePostTestSeeder::class,         // Memuat Soal Pre-Test & Post-Test
        ]);
        
        $this->command->info('✅ Seluruh Database berhasil di-Reset dan di-Seed dengan sempurna!');
    }
}
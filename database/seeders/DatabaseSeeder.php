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

        // 2. Panggil Semua Seeder Sekaligus (Lebih rapi dan cepat)
        $this->call([
            ContentSeeder::class,             // Memuat Bab 1, 2, 3 dsb.
            TeacherSeeder::class,             // Memuat Akun Guru
            UjiKompetensiAkhirSeeder::class,  // Memuat Uji Kompetensi (jika ada)
            PrePostTestSeeder::class,         // Memuat Soal Pre-Test & Post-Test
        ]);
        
        $this->command->info('✅ Seluruh Database berhasil di-Reset dan di-Seed dengan sempurna!');
    }
}
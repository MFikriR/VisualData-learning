<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        // Gunakan updateOrCreate untuk mencegah error duplikat
        User::updateOrCreate(
            ['email' => 'guru@sekolah.id'], // Kondisi Pencarian (Cek email)
            [
                'name' => 'Guru Pengampu',
                'password' => Hash::make('password'), // Ganti dengan password aslimu jika perlu
                'role' => 'teacher',
                'email_verified_at' => now(),
            ] // Data yang diupdate/dibuat
        );
        
        $this->command->info('✅ Akun Guru berhasil dikonfirmasi/diperbarui!');
    }
}
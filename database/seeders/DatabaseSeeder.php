<?php

namespace Database\Seeders;

use App\Models\LogPemilihan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'no_anggota' => 'xxx',
            'nama' => 'Admin',
            'asal_komda' => 'xxx',
            'email' => 'admin@ngobarengaidil.com',
            'password' => Hash::make('@#$admin123@#$'),
            'level' => 'admin',
            'status_keaktifan' => true
        ]);

        // Contoh Anggota
        User::create([
            'no_anggota' => 'YUPIR123',
            'nama' => 'Gulali Ijo',
            'asal_komda' => 'Kijang Selatan',
            'level' => 'anggota',
            'status_keaktifan' => true
        ]);

        // Contoh Dewan Kehormatan
        User::create([
            'no_anggota' => 'DEWAN123',
            'nama' => 'Gus Miftah',
            'asal_komda' => 'Senggaran Timur',
            'email' => 'gusgusan@gmail.com',
            'password' => Hash::make('gusgusan'),
            'level' => 'dewan',
            'status_keaktifan' => true
        ]);

        // Contoh Log Pemilihan
        LogPemilihan::create([
            'pemilih_id' => 3,
            'pilihan' => 1,
            'ip_address' => 'o1723082309123132131212321321',
        ]);
    }
}

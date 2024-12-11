<?php

namespace Database\Seeders;

use App\Models\LogPemilihan;
use App\Models\Setting;
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
            'nama' => 'Admin 1',
            'asal_komda' => 'xxx',
            'email' => 'admin-1@voting-isoi.id',
            'password' => Hash::make('admin1-isoi2024'),
            'level' => 'admin',
            'status_keaktifan' => true
        ]);
        User::create([
            'no_anggota' => 'xxxx',
            'nama' => 'Admin 2',
            'asal_komda' => 'xxx',
            'email' => 'admin-2@voting-isoi.id',
            'password' => Hash::make('admin2-isoi2024'),
            'level' => 'admin',
            'status_keaktifan' => true
        ]);

        // Default Voting Status
        Setting::create(['voting_status' => true]);

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

        $this->call(AnggotaSeeder::class);
    }
}

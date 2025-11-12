<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasienSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pasiens')->insert([
            [
                'nama_pasien' => 'Dinda Lestari',
                'alamat' => 'Jl. Ahmad Yani No. 12, Bandung',
                'no_telpon' => '081234567890',
                'id_rumah_sakit' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pasien' => 'Bagus Permadi',
                'alamat' => 'Jl. Merdeka No. 45, Cimahi',
                'no_telpon' => '081389456712',
                'id_rumah_sakit' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pasien' => 'Rini Handayani',
                'alamat' => 'Jl. Pasir Koja No. 56, Bandung',
                'no_telpon' => '087812341234',
                'id_rumah_sakit' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pasien' => 'Agus Santoso',
                'alamat' => 'Jl. Kopo No. 78, Bandung',
                'no_telpon' => '082145678900',
                'id_rumah_sakit' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pasien' => 'Siti Aisyah',
                'alamat' => 'Jl. Braga No. 33, Bandung',
                'no_telpon' => '089512345678',
                'id_rumah_sakit' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

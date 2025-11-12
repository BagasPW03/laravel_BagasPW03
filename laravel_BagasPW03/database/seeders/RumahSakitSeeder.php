<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RumahSakitSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rumah_sakits')->insert([
            [
                'nama_rumah_sakit' => 'RS Umum Pusat Bandung',
                'alamat' => 'Jl. Asia Afrika No.123, Bandung',
                'email' => 'info@rspusatbandung.com',
                'telepon' => '022-5551234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_rumah_sakit' => 'RS Harapan Sehat',
                'alamat' => 'Jl. Soekarno Hatta No.77, Bandung',
                'email' => 'kontak@harapansehat.id',
                'telepon' => '022-6789012',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_rumah_sakit' => 'RS Kasih Ibu',
                'alamat' => 'Jl. Merdeka No.45, Cimahi',
                'email' => 'info@kasihibu.com',
                'telepon' => '022-8881122',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_rumah_sakit' => 'RS Santosa',
                'alamat' => 'Jl. Pasteur No.21, Bandung',
                'email' => 'admin@santosa.id',
                'telepon' => '022-5674321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_rumah_sakit' => 'RS Citra Medika',
                'alamat' => 'Jl. Sukajadi No.10, Bandung',
                'email' => 'info@citramedika.co.id',
                'telepon' => '022-4321001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

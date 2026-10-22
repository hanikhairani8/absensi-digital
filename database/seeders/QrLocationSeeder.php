<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QrLocationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('qr_locations')->insert([
            [
                'nama_lokasi' => 'Gerbang Sekolah',
                'kode_lokasi' => 'QR-GERBANG',
                'latitude' => -6.0000000,
                'longitude' => 107.0000000,
                'radius' => 50,
                'status' => 1,
            ],
        ]);
    }
}
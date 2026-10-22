<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassRoomSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('class_rooms')->insert([
            ['nama_kelas' => 'XII RPL 1'],
            ['nama_kelas' => 'XII RPL 2'],
            ['nama_kelas' => 'XII TKJ 1'],
        ]);
    }
}
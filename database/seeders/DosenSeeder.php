<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosens')->insert([
            'nidn' => '00112233',
            'nama' => 'Andi',
            'alamat' => 'Jalan Pancasila',
            'tgl_lahir' => '1980-08-17',
            'foto_dosen'=>'gambar.jpg'
        ]);
        DB::table('dosens')->insert([
            'nidn' => '00155233',
            'nama' => 'Budi',
            'alamat' => 'Jalan Kota Baru',
            'tgl_lahir' => '1988-08-17',
            'foto_dosen'=>'gambar2.jpg'
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\JenisPengadilan;
use Illuminate\Database\Seeder;

class JenisPengadilanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        JenisPengadilan::create([
            'kode_jenis' => 'acehpu',
            'jenis_pengadilan' => 'Pengadilan umum',
        ]);

        JenisPengadilan::create([
            'kode_jenis' => 'acehpa',
            'jenis_pengadilan' => 'Mahkamah Agama',
        ]);

        JenisPengadilan::create([
            'kode_jenis' => 'acehpm',
            'jenis_pengadilan' => 'Pengadilan Militer',
        ]);

        JenisPengadilan::create([
            'kode_jenis' => 'acehptun',
            'jenis_pengadilan' => 'Pengadilan Tata Usaha Negara',
        ]);
    }
}

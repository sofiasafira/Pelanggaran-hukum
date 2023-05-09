<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;


class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds..
     *
     * @return void
     */
    public function run()
    {
        Kecamatan::create([
            'kode_kec' => 'baitur',
            'kode_kab_id' => 'acban1',
            'nama_kec' => 'Baiturrahman',
            'geojson_kec' => 'batas-kecamatan/bandaaceh/baiturrahman.geojson',
        ]);
        Kecamatan::create([
            'kode_kec' => 'kutalam',
            'kode_kab_id' => 'acban1',
            'nama_kec' => 'Kuta Alam',
            'geojson_kec' => 'batas-kecamatan/bandaaceh/kutaalam.geojson',
        ]);
        Kecamatan::create([
            'kode_kec' => 'meurax',
            'kode_kab_id' => 'acban1',
            'nama_kec' => 'Meuraxa',
            'geojson_kec' => 'batas-kecamatan/bandaaceh/meuraxa.geojson',
        ]);
        Kecamatan::create([
            'kode_kec' => 'syiah',
            'kode_kab_id' => 'acban1',
            'nama_kec' => 'Syiah Kuala',
            'geojson_kec' => 'batas-kecamatan/bandaaceh/syiahkuala.geojson',
        ]);
        Kecamatan::create([
            'kode_kec' => 'lueng',
            'kode_kab_id' => 'acban1',
            'nama_kec' => 'Lueng Bata',
            'geojson_kec' => 'batas-kecamatan/bandaaceh/luengbata.geojson',
        ]);
        Kecamatan::create([
            'kode_kec' => 'kutaraj',
            'kode_kab_id' => 'acban1',
            'nama_kec' => 'Kuta Raja',
            'geojson_kec' => 'batas-kecamatan/bandaaceh/kutaraja.geojson',
        ]);
        Kecamatan::create([
            'kode_kec' => 'bandaray',
            'kode_kab_id' => 'acban1',
            'nama_kec' => 'Banda Raya',
            'geojson_kec' => 'batas-kecamatan/bandaaceh/bandaraya.geojson',
        ]);
        Kecamatan::create([
            'kode_kec' => 'jaybar',
            'kode_kab_id' => 'acban1',
            'nama_kec' => 'Jaya Baru',
            'geojson_kec' => 'batas-kecamatan/bandaaceh/jayabaru.geojson',
        ]);
        Kecamatan::create([
            'kode_kec' => 'ulee',
            'kode_kab_id' => 'acban1',
            'nama_kec' => 'Ulee Kareng',
            'geojson_kec' => 'batas-kecamatan/bandaaceh/uleekareeng.geojson',
        ]);

    }
}

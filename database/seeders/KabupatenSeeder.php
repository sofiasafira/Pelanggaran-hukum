<?php

namespace Database\Seeders;

use App\Models\Kabupaten;
use Illuminate\Database\Seeder;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Kabupaten::create([
            'kode_kab' => 'aclho1',
            'nama_kab' => 'Kota Lhoksumawe',
            'geojson_kab' => 'batas-kabupaten/kota lhokseumawe.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acten1',
            'nama_kab' => 'Aceh Tengah',
            'geojson_kab' => 'batas-kabupaten/aceh tengah.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'aclan1',
            'nama_kab' => 'Kota Langsa',
            'geojson_kab' => 'batas-kabupaten/kota langsa.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'actam1',
            'nama_kab' => 'Aceh Tamiang',
            'geojson_kab' => 'batas-kabupaten/aceh tamiang.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acgay1',
            'nama_kab' => 'Gayo Lues',
            'geojson_kab' => 'batas-kabupaten/gayo lues.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acbar1',
            'nama_kab' => 'Aceh Barat',
            'geojson_kab' => 'batas-kabupaten/aceh barat.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acjay1',
            'nama_kab' => 'Aceh Jaya',
            'geojson_kab' => 'batas-kabupaten/aceh jaya.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acgar1',
            'nama_kab' => 'Aceh Tenggara',
            'geojson_kab' => 'batas-kabupaten/aceh tenggara.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acsim1',
            'nama_kab' => 'Simeulue',
            'geojson_kab' => 'batas-kabupaten/simeulue.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acsel1',
            'nama_kab' => 'Aceh Selatan',
            'geojson_kab' => 'batas-kabupaten/aceh selatan.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acsin1',
            'nama_kab' => 'Aceh Singkil',
            'geojson_kab' => 'batas-kabupaten/aceh singkil.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acbes1',
            'nama_kab' => 'Aceh Besar',
            'geojson_kab' => 'batas-kabupaten/aceh besar.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acbdy1',
            'nama_kab' => 'Aceh Barat Daya',
            'geojson_kab' => 'batas-kabupaten/aceh barat daya.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acngn1',
            'nama_kab' => 'Nagan Raya',
            'geojson_kab' => 'batas-kabupaten/nagan raya.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acbme1',
            'nama_kab' => 'Bener Meriah',
            'geojson_kab' => 'batas-kabupaten/bener meriah.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acpid1',
            'nama_kab' => 'Pidie Jaya',
            'geojson_kab' => 'batas-kabupaten/pidie jaya.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acsbs1',
            'nama_kab' => 'Kota Subulussalam',
            'geojson_kab' => 'batas-kabupaten/kota subulussalam.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'actim1',
            'nama_kab' => 'Aceh Timur',
            'geojson_kab' => 'batas-kabupaten/aceh timur.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acban1',
            'nama_kab' => 'Kota Banda Aceh',
            'geojson_kab' => 'batas-kabupaten/kota banda aceh.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acsab1',
            'nama_kab' => 'Kota Sabang',
            'geojson_kab' => 'batas-kabupaten/kota sabang.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acsig1',
            'nama_kab' => 'Sigli-Pidie',
            'geojson_kab' => 'batas-kabupaten/pidie.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acbir1',
            'nama_kab' => 'Bireun',
            'geojson_kab' => 'batas-kabupaten/bireuen.geojson',
        ]);

        Kabupaten::create([
            'kode_kab' => 'acuta1',
            'nama_kab' => 'Aceh Utara',
            'geojson_kab' => 'batas-kabupaten/aceh utara.geojson',
        ]);
    }
}

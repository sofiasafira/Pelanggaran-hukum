<?php

namespace Database\Seeders;

use App\Models\Direktori;
use Illuminate\Database\Seeder;

class DirektoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Direktori::create([
            'kode_direktori' => 'dir01',
            'nama_direktori' => 'Pidana Khusus/militer',
        ]);

        Direktori::create([
            'kode_direktori' => 'dir02',
            'nama_direktori' => 'Pidana Umum',
        ]);

        Direktori::create([
            'kode_direktori' => 'dir03',
            'nama_direktori' => 'Perdata',
        ]);

        Direktori::create([
            'kode_direktori' => 'dir04',
            'nama_direktori' => 'Perdata Khusus',
        ]);

        Direktori::create([
            'kode_direktori' => 'dir05',
            'nama_direktori' => 'Perdata Agama',
        ]);

        Direktori::create([
            'kode_direktori' => 'dir06',
            'nama_direktori' => 'TUN ',
        ]);
    }
}

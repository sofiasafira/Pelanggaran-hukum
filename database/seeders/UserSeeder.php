<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'id' => '1',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'actim1',
            'nama_pengadilan' => 'Pengadilan Negeri Idi',
            'username' => 'pn_idi',
            'password' => bcrypt('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. Peutua Husein No.4, Kp. Jawa, Kec. Idi Rayeuk, Kabupaten Aceh Timur, Aceh',
            'website' => 'http://pn-idi.go.id',
        ]);

        User::create([
            'id' => '11112',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acban1',
            'nama_pengadilan' => 'Pengadilan Negeri Banda Aceh',
            'username' => 'pn_banda_aceh',
            'password' => bcrypt('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Kota Baru, Kec. Kuta Alam, Kota Banda Aceh, Aceh',
            'website' => 'https://pn-bandaaceh.go.id/',
        ]);

        User::create([
            'id' => '11113',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acsab1',
            'nama_pengadilan' => 'Pengadilan Negeri Sabang',
            'username' => 'pn_sabang',
            'password' => bcrypt('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. Jenderal Ahmad Yani No.4, Kuta Ateuh, Sukakarya, Kota Sabang, Aceh 24411',
            'website' => 'http://www.pn-sabang.go.id',
        ]);
    }
}

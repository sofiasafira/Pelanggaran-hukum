<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'id' => '11111',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'actim1',
            'nama_pengadilan' => 'Pengadilan Negeri Idi',
            'username' => 'pengadilan_negeri_idi',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. Peutua Husein No.4, Kp. Jawa, Kec. Idi Rayeuk, Kabupaten Aceh Timur, Aceh',
            'website' => 'http://pn-idi.go.id',
        ]);

        User::create([
            'id' => '11112',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acban1',
            'nama_pengadilan' => 'Pengadilan Negeri Banda Aceh',
            'username' => 'pengadilan_negeri_banda_aceh',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Kota Baru, Kec. Kuta Alam, Kota Banda Aceh, Aceh',
            'website' => 'https://pn-bandaaceh.go.id/',
        ]);

        User::create([
            'id' => '11113',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acsab1',
            'nama_pengadilan' => 'Pengadilan Negeri Sabang',
            'username' => 'pengadilan_negeri_sabang',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. Jenderal Ahmad Yani No.4, Kuta Ateuh, Sukakarya, Kota Sabang, Aceh 24411',
            'website' => 'http://www.pn-sabang.go.id',
        ]);

        User::create([
            'id' => '11114',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acsig1',
            'nama_pengadilan' => 'Pengadilan Negeri Sigli',
            'username' => 'pengadilan_negeri_sigli',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. Tgk Chik Ditiro NO. 48 KM. 1, Sigli, Blang Asan, Kec. Pidie, Kabupaten Pidie, Aceh 24112',
            'website' => 'http://pn-sigli.go.id',
        ]);

        User::create([
            'id' => '11115',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acbir1',
            'nama_pengadilan' => 'Pengadilan Negeri Bireun',
            'username' => 'pengadilan_negeri_bireun',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Geulanggang Baro, Kec. Kota Juang, Kabupaten Bireuen, Aceh 24261',
            'website' => 'http://www.pn-bireuen.go.id',
        ]);

        User::create([
            'id' => '11116',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acuta1',
            'nama_pengadilan' => 'Pengadilan Negeri Lhok Sukon',
            'username' => 'pengadilan_negeri_lhok_sukon',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. Medan B. Aceh, Meunasah Reudeup, Kec. Lhoksukon, Kabupaten Aceh Utara, Aceh 24386',
            'website' => 'http://www.pn-lhoksukon.go.id',
        ]);

        User::create([
            'id' => '11117',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'aclho1',
            'nama_pengadilan' => 'Pengadilan Negeri Lhok Seumawe',
            'username' => 'pengadilan_negeri_lhok_seumawe',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. Iskandar Muda No.44, Kp. Jawa Lama, Kec. Banda Sakti, Kota Lhokseumawe, Aceh 24315',
            'website' => 'http://www.pn-lhokseumawe.go.id',
        ]);

        User::create([
            'id' => '11118',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acten1',
            'nama_pengadilan' => 'Pengadilan Negeri Takengon',
            'username' => 'pengadilan_negeri_takengon',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Blang Kolak II, Kec. Bebesen, Kabupaten Aceh Tengah, Aceh 24519',
            'website' => 'http://pn-takengon.go.id',
        ]);

        User::create([
            'id' => '11119',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'aclan1',
            'nama_pengadilan' => 'Pengadilan Negeri Langsa',
            'username' => 'pengadilan_negeri_langsa',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Gampong Jawa, Kec. Langsa Kota, Kota Langsa, Aceh 24375',
            'website' => 'http://pn-langsa.go.id',
        ]);

        User::create([
            'id' => '11120',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'actam1',
            'nama_pengadilan' => 'Pengadilan Negeri Kuala Simpang',
            'username' => 'pengadilan_negeri_kuala_simpang',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jalan Ir. H. Juanda No. 22, Karang Baru, Gampong Bundar, Kec. Karang Baru, Kabupaten Aceh Tamiang, Aceh 24456',
            'website' => 'http://www.pn-kualasimpang.go.id',
        ]);

        User::create([
            'id' => '11121',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acgay1',
            'nama_pengadilan' => 'Pengadilan Negeri Blangkajeren',
            'username' => 'pengadilan_negeri_blangkajeren',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. Kongbur No.52, Palok, Kec. Blangkejeren, Kabupaten Gayo Lues, Aceh 24653',
            'website' => 'http://www.pn-kualasimpang.go.id',
        ]);

        User::create([
            'id' => '11122',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acbar1',
            'nama_pengadilan' => 'Pengadilan Negeri Meulaboh',
            'username' => 'pengadilan_negeri_meulaboh',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Suwak Indrapuri, Kec. Johan Pahlawan, Kabupaten Aceh Barat, Aceh 23681',
            'website' => 'http://pn-meulaboh.go.id',
        ]);

        User::create([
            'id' => '11123',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acjay1',
            'nama_pengadilan' => 'Pengadilan Negeri Calang',
            'username' => 'pengadilan_negeri_calang',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jalan Pengadilan No.mor 10, Dayah Baro, Kec. Krueng Sabee, Kabupaten Aceh Jaya, Aceh 23655',
            'website' => 'http://www.pn-calang.go.id',
        ]);

        User::create([
            'id' => '11124',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acgar1',
            'nama_pengadilan' => 'Pengadilan Negeri Kutacane',
            'username' => 'pengadilan_negeri_kutacane',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. Cut Nyak Dhien No.174, Kota Kutacane, Kec. Babussalam, Kabupaten Aceh Tenggara, Aceh 24651',
            'website' => 'http://www.pn-kutacane.go.id',
        ]);

        User::create([
            'id' => '11125',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acsim1',
            'nama_pengadilan' => 'Pengadilan Negeri Sinabang',
            'username' => 'pengadilan_negeri_sinabang',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Suka Jaya, Kec. Simeulue Tim., Kabupaten Simeulue, Aceh 24782',
            'website' => 'http://pn-sinabang.go.id',
        ]);

        User::create([
            'id' => '11126',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acsel1',
            'nama_pengadilan' => 'Pengadilan Negeri Tapaktuan',
            'username' => 'pengadilan_negeri_tapaktuan',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Hulu, Kec. Tapak Tuan, Kabupaten Aceh Selatan, Aceh 23715',
            'website' => 'http://www.pn-tapaktuan.go.id',
        ]);

        User::create([
            'id' => '11127',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acsin1',
            'nama_pengadilan' => 'Pengadilan Negeri Singkil',
            'username' => 'pengadilan_negeri_singkil',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Ketapang Indah, Kec. Singkil Utara, Kabupaten Aceh Singkil, Aceh 24472',
            'website' => 'http://www.pn-singkel.go.id',
        ]);

        User::create([
            'id' => '11128',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acbes1',
            'nama_pengadilan' => 'Pengadilan Negeri Jantho',
            'username' => 'pengadilan_negeri_jantho',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl.T. Bakhtiar Panglima Polem, SH Kota, Jantho, Kec. Kota Jantho, Kabupaten Aceh Besar, Aceh 23911',
            'website' => 'http://www.pn-jantho.go.id',
        ]);

        User::create([
            'id' => '11129',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acbdy1',
            'nama_pengadilan' => 'Pengadilan Negeri Blangpidie',
            'username' => 'pengadilan_negeri_blangpidie',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Komplek Perkantoran, Mata Ie, Kecamaten Blang Pidie, Kabupaten Aceh Barat Daya, Aceh 23765',
            'website' => 'http://www.pn-blangpidie.go.id',
        ]);

        User::create([
            'id' => '11130',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acngn1',
            'nama_pengadilan' => 'Pengadilan Negeri Sukamakmue',
            'username' => 'pengadilan_negeri_sukamakmue',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Green Garden Pengadilan Negeri, Jl. Nuruddin Ar-Raniry, Suak Bili, Kec. Suka Makmue, Kabupaten Nagan Raya, Aceh 23671',
            'website' => 'http://www.pn-sukamakmue.go.id/',
        ]);

        User::create([
            'id' => '11131',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acbme1',
            'nama_pengadilan' => 'Pengadilan Negeri Simpang Tiga Redelong',
            'username' => 'pengadilan_negeri_simpang_tiga_redelong',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. Bandara Rembele - Pante Raya Simpang Tiga Redelong, PRGF+F9W, Bale Atu, Kec. Bukit, Kabupaten Bener Meriah, Aceh 24582',
            'website' => 'http://pn-simpangtigaredelong.go.id',
        ]);

        User::create([
            'id' => '11132',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acpid1',
            'nama_pengadilan' => 'Pengadilan Negeri Meureudu',
            'username' => 'pengadilan_negeri_meureudu',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Manyang Lancok, Kec. Meureudu, Kabupaten Pidie Jaya, Aceh',
            'website' => 'http://pn-meureudu.go.id',
        ]);

        User::create([
            'id' => '11133',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'actim1',
            'nama_pengadilan' => 'Mahkamah Syariah Idi',
            'username' => 'mahkamah_syariah_idi',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Paya Gajah, Kec. Peureulak Bar., Kabupaten Aceh Timur, Aceh 24454',
            'website' => 'http://ms-idi.net',
        ]);

        User::create([
            'id' => '11134',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acban1',
            'nama_pengadilan' => 'Mahkamah Syariah Banda Aceh',
            'username' => 'mahkamah_syariah_banda_aceh',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. RSUD Meuraxa, Mibo, Kec. Banda Raya, Kota Banda Aceh, Aceh 23238',
            'website' => 'http://www.ms-bandaaceh.go.id',
        ]);

        User::create([
            'id' => '11135',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acsab1',
            'nama_pengadilan' => 'Mahkamah Syariah Sabang',
            'username' => 'mahkamah_syariah_sabang',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Cot Ba\'u, Kec. Sukajaya, Kota Sabang, Aceh 23522',
            'website' => 'http://www.ms-sabang.go.id',
        ]);

        User::create([
            'id' => '11136',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acsig1',
            'nama_pengadilan' => 'Mahkamah Syariah Sigli',
            'username' => 'mahkamah_syariah_sigli',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. Lingkar Blang Paseh Sigli, 9X96+9HQ, Lampeudeu Baroh, Kec. Pidie, Kabupaten Pidie, Aceh 24113',
            'website' => 'http://www.ms-sigli.go.id',
        ]);

        User::create([
            'id' => '11137',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acbir1',
            'nama_pengadilan' => 'Mahkamah Syariah Bireun',
            'username' => 'mahkamah_syariah_bireun',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'JL Letkol Alamsyah No.1, Blang Bladeh, Kec. Jeumpa, Kabupaten Bireuen, Aceh 24211',
            'website' => 'http://ms-bireuen.go.id',
        ]);

        User::create([
            'id' => '11138',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acuta1',
            'nama_pengadilan' => 'Mahkamah Syariah Lhoksukun',
            'username' => 'mahkamah_syariah_lhoksukun',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Alue Mudem, Kec. Lhoksukon, Kabupaten Aceh Utara, Aceh 24386',
            'website' => 'http://www.ms-lhoksukon.go.id',
        ]);

        User::create([
            'id' => '11139',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'aclho1',
            'nama_pengadilan' => 'Mahkamah Syariah Lhok Seumawe',
            'username' => 'mahkamah_syariah_lhok_seumawe',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. Medan B. Aceh, Alue Awe, Kec. Muara Dua, Kota Lhokseumawe, Jawa Timur 65154',
            'website' => 'http://ms-lhokseumawe.go.id',
        ]);

        User::create([
            'id' => '11140',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acten1',
            'nama_pengadilan' => 'Mahkamah Syariah Takengon',
            'username' => 'mahkamah_syariah_takengon',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Simpang Kelaping, Kec. Pegasing, Kabupaten Aceh Tengah, Aceh 24561',
            'website' => 'http://ms-takengon.net',
        ]);

        User::create([
            'id' => '11141',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'aclan1',
            'nama_pengadilan' => 'Mahkamah Syariah Langsa',
            'username' => 'mahkamah_syariah_langsa',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jalan TM Bahrum, Desa, Paya Bujok Teungoh, Kec. Langsa Bar., Kota Langsa, Aceh 24413',
            'website' => 'http://ms-langsa.go.id',
        ]);

        User::create([
            'id' => '11142',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'actam1',
            'nama_pengadilan' => 'Mahkamah Syariah Kuala Simpang',
            'username' => 'mahkamah_syariah_kuala_simpang',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Komplek Perkantoran Pemkab, Gampong Bundar, Kec. Karang Baru, Kabupaten Aceh Tamiang, Aceh 24476',
            'website' => 'http://ms-kualasimpang.go.id',
        ]);

        User::create([
            'id' => '11143',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acgay1',
            'nama_pengadilan' => 'Mahkamah Syariah Blangkajeren',
            'username' => 'mahkamah_syariah_blangkajeren',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. Inen Mayak Teri, Sp. Reli, X8WH+CWP, Kp. Jawa, Kec. Blangkejeren, Kabupaten Gayo Lues, Aceh 24655',
            'website' => 'http://ms-blangkejeren.go.id',
        ]);

        User::create([
            'id' => '11144',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acsbs1',
            'nama_pengadilan' => 'Mahkamah Syariah Kota Subulussalam',
            'username' => 'mahkamah_syariah_kota_subulussalam',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Penanggalan, Kec. Penanggalan, Kota Subulussalam, Aceh 24780',
            'website' => 'http://www.ms-kotasubulussalam.go.id',
        ]);

        User::create([
            'id' => '11145',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acbar1',
            'nama_pengadilan' => 'Mahkamah Syariah Meulaboh',
            'username' => 'mahkamah_syariah_meulaboh',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Paya Peunaga, Kec. Meureubo, Kabupaten Aceh Barat, Aceh 23681',
            'website' => 'http://ms-meulaboh.go.id',
        ]);

        User::create([
            'id' => '11146',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acjay1',
            'nama_pengadilan' => 'Mahkamah Syariah Calang',
            'username' => 'mahkamah_syariah_calang',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Kp. Blang, Kec. Krueng Sabee, Kabupaten Aceh Jaya, Aceh 23655',
            'website' => 'http://www.ms-calang.go.id',
        ]);

        User::create([
            'id' => '11147',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acgar1',
            'nama_pengadilan' => 'Mahkamah Syariah Kutacane',
            'username' => 'mahkamah_syariah_kutacane',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'JL Teuku Bedussamad No.259, Pulo Sanggar, Kec. Babussalam, Kabupaten Aceh Tenggara, Aceh 24651',
            'website' => 'http://pn-kutacane.go.id/',
        ]);

        User::create([
            'id' => '11148',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acsim1',
            'nama_pengadilan' => 'Mahkamah Syariah Sinabang',
            'username' => 'mahkamah_syariah_sinabang',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. Tgk. Diujung Km. 5, Desa Suak Buluh, Nangroe, Darussalam, Suak Buluh, Aceh Besar, Kabupaten Simeulue, Aceh 24786',
            'website' => 'http://ms-sinabang.net',
        ]);

        User::create([
            'id' => '11149',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acsel1',
            'nama_pengadilan' => 'Mahkamah Syariah Tapaktuan',
            'username' => 'mahkamah_syariah_tapaktuan',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. T. Ben Mahmud, Air Berudang, Kec. Tapak Tuan, Kabupaten Aceh Selatan, Aceh 23711',
            'website' => 'http://ms-tapaktuan.go.id',
        ]);

        User::create([
            'id' => '11150',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acsin1',
            'nama_pengadilan' => 'Mahkamah Syariah Singkil',
            'username' => 'mahkamah_syariah_singkil',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. Singkil - Rimo No.Km. 20, Ketapang Indah, Kec. Singkil, Kabupaten Aceh Singkil, Aceh 23785',
            'website' => 'http://ms-singkil.go.id',
        ]);

        User::create([
            'id' => '11151',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acbes1',
            'nama_pengadilan' => 'Mahkamah Syariah Jantho',
            'username' => 'mahkamah_syariah_jantho',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jantho Makmur, Kec. Kota Jantho, Kabupaten Aceh Besar, Aceh 23951',
            'website' => 'http://ms-jantho.go.id',
        ]);

        User::create([
            'id' => '11152',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acbdy1',
            'nama_pengadilan' => 'Mahkamah Syariah Blangpidie',
            'username' => 'mahkamah_syariah_blangpidie',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Mata Ie, Kecamaten Blang Pidie, Kabupaten Aceh Barat Daya, Aceh 23763',
            'website' => 'http://www.ms-blangpidie.go.id',
        ]);

        User::create([
            'id' => '11153',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acngn1',
            'nama_pengadilan' => 'Mahkamah Syariah Sukamakmue',
            'username' => 'mahkamah_syariah_sukamakmue',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jln. Paduka Yang Mulia Presiden Soekarno, Komplek Perkantoran, Kec. Suka Makmue, Kabupaten Nagan Raya, Aceh 23671',
            'website' => 'http://ms-sukamakmue.go.id',
        ]);

        User::create([
            'id' => '11154',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acbme1',
            'nama_pengadilan' => 'Mahkamah Syariah Simpang Tiga Redelong',
            'username' => 'mahkamah_syariah_simpang_tiga_redelong',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Pante Raya, Kec. Wih Pesam, Kabupaten Bener Meriah, Aceh 24471',
            'website' => 'https://pn-simpangtigaredelong.go.id/',
        ]);

        User::create([
            'id' => '11155',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acpid1',
            'nama_pengadilan' => 'Mahkamah Syariah Meureudu',
            'username' => 'mahkamah_syariah_meureudu',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. Banda Aceh-Medan,, Kec. Meureudu, Manyang Lancok, Kec. Meureudu, Kabupaten Pidie Jaya, Aceh',
            'website' => 'http://www.ms-meureudu.go.id',
        ]);

        User::create([
            'id' => '11156',
            'kode_jenis_id' => 'acehptun',
            'kode_kab_id' => 'acban1',
            'nama_pengadilan' => 'Pengadilan Tata Usaha Negara Banda Aceh',
            'username' => 'pengadilan_tata_usaha_negara_banda_aceh',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'Jl. Ir. Moh. Taher No.25, Lueng Bata, Kec. Lueng Bata, Kota Banda Aceh, Aceh 23247',
            'website' => 'http://ptun-bandaaceh.go.id/',
        ]);

        User::create([
            'id' => '11157',
            'kode_jenis_id' => 'acehpm',
            'kode_kab_id' => 'acban1',
            'nama_pengadilan' => 'Pengadilan Militer Banda Aceh',
            'username' => 'pengadilan_militer_banda_aceh',
            'password' => Hash::make('12345'),
            'gambar' => 'xxxxx',
            'alamat' => 'JL. Tengku Imum No.108, Blang Cut, Lueng Bata, Banda Aceh City, Aceh 23127',
            'website' => 'https://dilmil-aceh.go.id/',
        ]);
    }
}

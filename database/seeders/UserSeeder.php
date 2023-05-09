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
            'gambar' => 'gambar-pengadilan/pn idi.jpg',
            'alamat' => 'Jl. Peutua Husein No.4, Kp. Jawa, Kec. Idi Rayeuk, Kabupaten Aceh Timur, Aceh',
            'longitude' => '97.77294',
            'latitude' => '4.94971',
            'website' => 'http://pn-idi.go.id',
            'sipp' => 'https://sipp.pn-sabang.go.id/',
            'maps' => 'https://goo.gl/maps/1TfeNaeSwdHRGWTF9',
        ]);

        User::create([
            'id' => '11112',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acban1',
            'nama_pengadilan' => 'Pengadilan Negeri Banda Aceh',
            'username' => 'pengadilan_negeri_banda_aceh',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn banda aceh.jpg',
            'alamat' => 'Kota Baru, Kec. Kuta Alam, Kota Banda Aceh, Aceh',
            'longitude' => '95.34039',
            'latitude' => '5.56679',
            'website' => 'https://pn-bandaaceh.go.id/',
            'sipp' => 'https://sipp.pn-bandaaceh.go.id/',
            'maps' => 'https://goo.gl/maps/AwTT11Y8SCcB6GTb8',
        ]);

        User::create([
            'id' => '11113',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acsab1',
            'nama_pengadilan' => 'Pengadilan Negeri Sabang',
            'username' => 'pengadilan_negeri_sabang',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn sabang.jpeg',
            'alamat' => 'Jl. Jenderal Ahmad Yani No.4, Kuta Ateuh, Sukakarya, Kota Sabang, Aceh 24411',
            'longitude' => '95.32481',
            'latitude' => '5.8952',
            'website' => 'http://www.pn-sabang.go.id',
            'sipp' => 'https://sipp.pn-sabang.go.id/',
            'maps' => 'https://goo.gl/maps/ESYTwCi8UwM5PjHy8',
        ]);

        User::create([
            'id' => '11114',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acsig1',
            'nama_pengadilan' => 'Pengadilan Negeri Sigli',
            'username' => 'pengadilan_negeri_sigli',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn sigli.jpg',
            'alamat' => 'Jl. Tgk Chik Ditiro NO. 48 KM. 1, Sigli, Blang Asan, Kec. Pidie, Kabupaten Pidie, Aceh 24112',
            'longitude' => '95.95186',
            'latitude' => '5.37971',
            'website' => 'http://pn-sigli.go.id',
            'sipp' => 'http://sipp.pn-sigli.go.id/',
            'maps' => 'https://goo.gl/maps/P8nNXiFX78Y7ZdATA',
        ]);

        User::create([
            'id' => '11115',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acbir1',
            'nama_pengadilan' => 'Pengadilan Negeri Bireun',
            'username' => 'pengadilan_negeri_bireun',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn bireuen.jpg',
            'alamat' => 'Geulanggang Baro, Kec. Kota Juang, Kabupaten Bireuen, Aceh 24261',
            'longitude' => '96.71786',
            'latitude' => '5.20349',
            'website' => 'http://www.pn-bireuen.go.id',
            'sipp' => 'https://sipp.pn-bireuen.go.id/',
            'maps' => 'https://goo.gl/maps/Uuhy8D5EL5TMcXLu9',
        ]);

        User::create([
            'id' => '11116',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acuta1',
            'nama_pengadilan' => 'Pengadilan Negeri Lhok Sukon',
            'username' => 'pengadilan_negeri_lhok_sukon',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/lhoksukon.jpg',
            'alamat' => 'Jl. Medan B. Aceh, Meunasah Reudeup, Kec. Lhoksukon, Kabupaten Aceh Utara, Aceh 24386',
            'longitude' => '97.33884',
            'latitude' => '5.05825',
            'website' => 'http://www.pn-lhoksukon.go.id',
            'sipp' => 'https://sipp.pn-lhoksukon.go.id/',
            'maps' => 'https://goo.gl/maps/fk2f3eHUcqp1s7He9',
        ]);

        User::create([
            'id' => '11117',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'aclho1',
            'nama_pengadilan' => 'Pengadilan Negeri Lhok Seumawe',
            'username' => 'pengadilan_negeri_lhok_seumawe',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn lhokseumawe.jpg',
            'alamat' => 'Jl. Iskandar Muda No.44, Kp. Jawa Lama, Kec. Banda Sakti, Kota Lhokseumawe, Aceh 24315',
            'longitude' => '97.15083',
            'latitude' => '5.18379',
            'website' => 'http://www.pn-lhokseumawe.go.id',
            'sipp' => 'https://sipp.pn-lhokseumawe.go.id/',
            'maps' => 'https://goo.gl/maps/o1XJrJ3pYK8ENQd26',
        ]);

        User::create([
            'id' => '11118',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acten1',
            'nama_pengadilan' => 'Pengadilan Negeri Takengon',
            'username' => 'pengadilan_negeri_takengon',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn takengon.jpg',
            'alamat' => 'Blang Kolak II, Kec. Bebesen, Kabupaten Aceh Tengah, Aceh 24519',
            'longitude' => '96.84234',
            'latitude' => '4.62251',
            'website' => 'http://pn-takengon.go.id',
            'sipp' => 'https://sipp.pn-takengon.go.id/',
            'maps' => 'https://goo.gl/maps/mCEWEKqwcpPwxXat7',
        ]);

        User::create([
            'id' => '11119',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'aclan1',
            'nama_pengadilan' => 'Pengadilan Negeri Langsa',
            'username' => 'pengadilan_negeri_langsa',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn langsa.jpg',
            'alamat' => 'Gampong Jawa, Kec. Langsa Kota, Kota Langsa, Aceh 24375',
            'longitude' => '97.96466',
            'latitude' => '4.46881',
            'website' => 'http://pn-langsa.go.id',
            'sipp' => 'http://sipp.pn-langsa.go.id/',
            'maps' => 'https://goo.gl/maps/j7m3FTLQ6DPgmiLx7',
        ]);

        User::create([
            'id' => '11120',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'actam1',
            'nama_pengadilan' => 'Pengadilan Negeri Kuala Simpang',
            'username' => 'pengadilan_negeri_kuala_simpang',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn kualasimpang.jpg',
            'alamat' => 'Jalan Ir. H. Juanda No. 22, Karang Baru, Gampong Bundar, Kec. Karang Baru, Kabupaten Aceh Tamiang, Aceh 24456',
            'longitude' => '98.04982',
            'latitude' => '4.29157',
            'website' => 'http://www.pn-kualasimpang.go.id',
            'sipp' => 'http://sipp.pn-kualasimpang.go.id/',
            'maps' => 'https://goo.gl/maps/NbQ7rX2VfEfNyNVr8',
        ]);

        User::create([
            'id' => '11121',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acgay1',
            'nama_pengadilan' => 'Pengadilan Negeri Blangkajeren',
            'username' => 'pengadilan_negeri_blangkajeren',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn blangkejeren.jpg',
            'alamat' => 'Jl. Kongbur No.52, Palok, Kec. Blangkejeren, Kabupaten Gayo Lues, Aceh 24653',
            'longitude' => '97.37306',
            'latitude' => '3.93451',
            'website' => 'http://www.pn-kualasimpang.go.id',
            'sipp' => 'https://sipp.pn-blangkejeren.go.id/',
            'maps' => 'https://goo.gl/maps/jhn8J7VkUCWEVXa9A',
        ]);

        User::create([
            'id' => '11122',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acbar1',
            'nama_pengadilan' => 'Pengadilan Negeri Meulaboh',
            'username' => 'pengadilan_negeri_meulaboh',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn meulaboh.jpg',
            'alamat' => 'Suwak Indrapuri, Kec. Johan Pahlawan, Kabupaten Aceh Barat, Aceh 23681',
            'longitude' => '96.12886',
            'latitude' => '4.13299',
            'website' => 'http://pn-meulaboh.go.id',
            'sipp' => 'https://sipp.pn-meulaboh.go.id/',
            'maps' => 'https://goo.gl/maps/LScLRsxCMj5Ji3LL7',
        ]);

        User::create([
            'id' => '11123',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acjay1',
            'nama_pengadilan' => 'Pengadilan Negeri Calang',
            'username' => 'pengadilan_negeri_calang',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn calang.jpg ',
            'alamat' => 'Jalan Pengadilan No.mor 10, Dayah Baro, Kec. Krueng Sabee, Kabupaten Aceh Jaya, Aceh 23655',
            'longitude' => '95.58713',
            'latitude' => '4.64061',
            'website' => 'http://www.pn-calang.go.id',
            'sipp' => 'https://sipp.pn-calang.go.id/',
            'maps' => 'https://goo.gl/maps/7oxJizxp34inGP846',
        ]);

        User::create([
            'id' => '11124',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acgar1',
            'nama_pengadilan' => 'Pengadilan Negeri Kutacane',
            'username' => 'pengadilan_negeri_kutacane',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn kutacane.jpg',
            'alamat' => 'Jl. Cut Nyak Dhien No.174, Kota Kutacane, Kec. Babussalam, Kabupaten Aceh Tenggara, Aceh 24651',
            'longitude' => '97.80814',
            'latitude' => '3.4908',
            'website' => 'http://www.pn-kutacane.go.id',
            'sipp' => 'https://sipp.pn-kutacane.go.id/',
            'maps' => 'https://goo.gl/maps/qMrmRgFu46Qr9VeE9',
        ]);

        User::create([
            'id' => '11125',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acsim1',
            'nama_pengadilan' => 'Pengadilan Negeri Sinabang',
            'username' => 'pengadilan_negeri_sinabang',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn sinabang.jpg',
            'alamat' => 'Suka Jaya, Kec. Simeulue Tim., Kabupaten Simeulue, Aceh 24782',
            'longitude' => '96.38079',
            'latitude' => '2.46705',
            'website' => 'http://pn-sinabang.go.id',
            'sipp' => 'http://sipp.pn-sinabang.go.id/',
            'maps' => 'https://goo.gl/maps/PyxPaY6qrz8wNcXJ7',
        ]);

        User::create([
            'id' => '11126',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acsel1',
            'nama_pengadilan' => 'Pengadilan Negeri Tapaktuan',
            'username' => 'pengadilan_negeri_tapaktuan',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn tapaktuan.jpg',
            'alamat' => 'Hulu, Kec. Tapak Tuan, Kabupaten Aceh Selatan, Aceh 23715',
            'longitude' => '97.17983',
            'latitude' => '3.25994',
            'website' => 'http://www.pn-tapaktuan.go.id',
            'sipp' => 'https://sipp.pn-tapaktuan.go.id/',
            'maps' => 'https://goo.gl/maps/C49vUjmJfi34dcBF6',
        ]);

        User::create([
            'id' => '11127',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acsin1',
            'nama_pengadilan' => 'Pengadilan Negeri Singkil',
            'username' => 'pengadilan_negeri_singkil',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn singkil.jpg',
            'alamat' => 'Ketapang Indah, Kec. Singkil Utara, Kabupaten Aceh Singkil, Aceh 24472',
            'longitude' => '97.94547',
            'latitude' => '2.2792',
            'website' => 'http://www.pn-singkel.go.id',
            'sipp' => 'https://sipp.ms-singkil.go.id/',
            'maps' => 'https://goo.gl/maps/XZX31pYo3pMpu7QE8',
        ]);

        User::create([
            'id' => '11128',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acbes1',
            'nama_pengadilan' => 'Pengadilan Negeri Jantho',
            'username' => 'pengadilan_negeri_jantho',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn jantho.jpg',
            'alamat' => 'Jl.T. Bakhtiar Panglima Polem, SH Kota, Jantho, Kec. Kota Jantho, Kabupaten Aceh Besar, Aceh 23911',
            'longitude' => '95.60416',
            'latitude' => '5.29926',
            'website' => 'http://www.pn-jantho.go.id',
            'sipp' => 'https://sipp.ms-jantho.go.id/',
            'maps' => 'https://goo.gl/maps/wHZXh14g2iHNm6uk7',
        ]);

        User::create([
            'id' => '11129',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acbdy1',
            'nama_pengadilan' => 'Pengadilan Negeri Blangpidie',
            'username' => 'pengadilan_negeri_blangpidie',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn blangpidie.jpg',
            'alamat' => 'Komplek Perkantoran, Mata Ie, Kecamaten Blang Pidie, Kabupaten Aceh Barat Daya, Aceh 23765',
            'longitude' => '96.8503',
            'latitude' => '3.74141',
            'website' => 'http://www.pn-blangpidie.go.id',
            'sipp' => 'http://sipp.pn-blangpidie.go.id/',
            'maps' => 'https://goo.gl/maps/1a8rxyCtLJisbUtw9',
        ]);

        User::create([
            'id' => '11130',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acngn1',
            'nama_pengadilan' => 'Pengadilan Negeri Sukamakmue',
            'username' => 'pengadilan_negeri_sukamakmue',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn suka makmue.jpg',
            'alamat' => 'Green Garden Pengadilan Negeri, Jl. Nuruddin Ar-Raniry, Suak Bili, Kec. Suka Makmue, Kabupaten Nagan Raya, Aceh 23671',
            'longitude' => '96.32475',
            'latitude' => '4.16268',
            'website' => 'http://www.pn-sukamakmue.go.id/',
            'sipp' => 'https://sipp.pn-sukamakmue.go.id/',
            'maps' => 'https://goo.gl/maps/Tj4b4gyekbADNeCi9',
        ]);

        User::create([
            'id' => '11131',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acbme1',
            'nama_pengadilan' => 'Pengadilan Negeri Simpang Tiga Redelong',
            'username' => 'pengadilan_negeri_simpang_tiga_redelong',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn simpang tiga redelong.jpg',
            'alamat' => 'Jl. Bandara Rembele - Pante Raya Simpang Tiga Redelong, PRGF+F9W, Bale Atu, Kec. Bukit, Kabupaten Bener Meriah, Aceh 24582',
            'longitude' => '96.82346',
            'latitude' => '4.72623',
            'website' => 'http://pn-simpangtigaredelong.go.id',
            'sipp' => 'http://sipp.pn-simpangtigaredelong.go.id/',
            'maps' => 'https://goo.gl/maps/pSh2VZjYPda5ZZj48',
        ]);

        User::create([
            'id' => '11132',
            'kode_jenis_id' => 'acehpu',
            'kode_kab_id' => 'acpid1',
            'nama_pengadilan' => 'Pengadilan Negeri Meureudu',
            'username' => 'pengadilan_negeri_meureudu',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pn meureudu.jpg',
            'alamat' => 'Manyang Lancok, Kec. Meureudu, Kabupaten Pidie Jaya, Aceh',
            'longitude' => '96.24736',
            'latitude' => '5.22965',
            'website' => 'http://pn-meureudu.go.id',
            'sipp' => 'https://sipp.pn-meureudu.go.id/',
            'maps' => 'https://goo.gl/maps/jibNZNsQdPS4HjVv9',
        ]);

        User::create([
            'id' => '11133',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'actim1',
            'nama_pengadilan' => 'Mahkamah Syariah Idi',
            'username' => 'mahkamah_syariah_idi',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms idi.jpg',
            'alamat' => 'Paya Gajah, Kec. Peureulak Bar., Kabupaten Aceh Timur, Aceh 24454',
            'longitude' => '97.8621',
            'latitude' => '4.8589',
            'website' => 'http://ms-idi.net',
            'sipp' => 'http://sipp.pn-idi.go.id/',
            'maps' => 'https://goo.gl/maps/qNEVprN7GbGAeB9i6',
        ]);

        User::create([
            'id' => '11134',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acban1',
            'nama_pengadilan' => 'Mahkamah Syariah Banda Aceh',
            'username' => 'mahkamah_syariah_banda_aceh',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms banda aceh.jpg',
            'alamat' => 'Jl. RSUD Meuraxa, Mibo, Kec. Banda Raya, Kota Banda Aceh, Aceh 23238',
            'longitude' => '95.31916',
            'latitude' => '5.51937',
            'website' => 'http://www.ms-bandaaceh.go.id',
            'sipp' => 'https://www.sipp.ms-bandaaceh.go.id/',
            'maps' => 'https://goo.gl/maps/8iMCRruUYYY778Nc9',
        ]);

        User::create([
            'id' => '11135',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acsab1',
            'nama_pengadilan' => 'Mahkamah Syariah Sabang',
            'username' => 'mahkamah_syariah_sabang',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms sabang.jpg',
            'alamat' => 'Cot Ba\'u, Kec. Sukajaya, Kota Sabang, Aceh 23522',
            'longitude' => '95.33337',
            'latitude' => '5.8813',
            'website' => 'http://www.ms-sabang.go.id',
            'sipp' => 'https://sipp.ms-sabang.go.id/',
            'maps' => 'https://goo.gl/maps/SdMrqdbAPBkqULLU7',
        ]);

        User::create([
            'id' => '11136',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acsig1',
            'nama_pengadilan' => 'Mahkamah Syariah Sigli',
            'username' => 'mahkamah_syariah_sigli',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms sigli.jpg',
            'alamat' => 'Jl. Lingkar Blang Paseh Sigli, 9X96+9HQ, Lampeudeu Baroh, Kec. Pidie, Kabupaten Pidie, Aceh 24113',
            'longitude' => '95.96149',
            'latitude' => '5.36845',
            'website' => 'http://www.ms-sigli.go.id',
            'sipp' => 'https://sipp.ms-sigli.go.id/',
            'maps' => 'https://goo.gl/maps/me1JykmoVMEBPhd7A',
        ]);

        User::create([
            'id' => '11137',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acbir1',
            'nama_pengadilan' => 'Mahkamah Syariah Bireun',
            'username' => 'mahkamah_syariah_bireun',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms bireuen.jpg',
            'alamat' => 'JL Letkol Alamsyah No.1, Blang Bladeh, Kec. Jeumpa, Kabupaten Bireuen, Aceh 24211',
            'longitude' => '96.66088',
            'latitude' => '5.20568',
            'website' => 'http://ms-bireuen.go.id',
            'sipp' => 'https://sipp.ms-bireuen.go.id/',
            'maps' => 'https://goo.gl/maps/SD3qfr2teTkcB4Ce6',
        ]);

        User::create([
            'id' => '11138',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acuta1',
            'nama_pengadilan' => 'Mahkamah Syariah Lhoksukun',
            'username' => 'mahkamah_syariah_lhoksukun',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms lhoksukon.jpg',
            'alamat' => 'Alue Mudem, Kec. Lhoksukon, Kabupaten Aceh Utara, Aceh 24386',
            'longitude' => '97.30916',
            'latitude' => '5.06724',
            'website' => 'http://www.ms-lhoksukon.go.id',
            'sipp' => 'https://www.sipp.ms-lhoksukon.go.id/',
            'maps' => 'https://goo.gl/maps/Uc3xNigqVFr1k4gD8',
        ]);

        User::create([
            'id' => '11139',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'aclho1',
            'nama_pengadilan' => 'Mahkamah Syariah Lhok Seumawe',
            'username' => 'mahkamah_syariah_lhok_seumawe',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms lhokseumawe.jpg',
            'alamat' => 'Jl. Medan B. Aceh, Alue Awe, Kec. Muara Dua, Kota Lhokseumawe, Jawa Timur 65154',
            'longitude' => '97.15267',
            'latitude' => '5.1314',
            'website' => 'http://ms-lhokseumawe.go.id',
            'sipp' => 'https://sipp.ms-lhokseumawe.go.id/',
            'maps' => 'https://goo.gl/maps/3XrwhFU6zqXxUvTo6',
        ]);

        User::create([
            'id' => '11140',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acten1',
            'nama_pengadilan' => 'Mahkamah Syariah Takengon',
            'username' => 'mahkamah_syariah_takengon',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms takengon.jpg',
            'alamat' => 'Simpang Kelaping, Kec. Pegasing, Kabupaten Aceh Tengah, Aceh 24561',
            'longitude' => '96.80942',
            'latitude' => '4.5957',
            'website' => 'http://ms-takengon.net',
            'sipp' => 'https://sipp.ms-takengon.net/',
            'maps' => 'https://goo.gl/maps/2SbUv4q2g8xJoy3G8',
        ]);

        User::create([
            'id' => '11141',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'aclan1',
            'nama_pengadilan' => 'Mahkamah Syariah Langsa',
            'username' => 'mahkamah_syariah_langsa',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms langsa.jpg',
            'alamat' => 'Jalan TM Bahrum, Desa, Paya Bujok Teungoh, Kec. Langsa Bar., Kota Langsa, Aceh 24413',
            'longitude' => '97.96601',
            'latitude' => '4.48988',
            'website' => 'http://ms-langsa.go.id',
            'sipp' => 'http://sipp.ms-langsa.go.id/',
            'maps' => 'https://goo.gl/maps/iGR3dGwVNz3viupF6',
        ]);

        User::create([
            'id' => '11142',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'actam1',
            'nama_pengadilan' => 'Mahkamah Syariah Kuala Simpang',
            'username' => 'mahkamah_syariah_kuala_simpang',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms kuala simpang.jpg',
            'alamat' => 'Komplek Perkantoran Pemkab, Gampong Bundar, Kec. Karang Baru, Kabupaten Aceh Tamiang, Aceh 24476',
            'longitude' => '98.04312',
            'latitude' => '4.29572',
            'website' => 'http://ms-kualasimpang.go.id',
            'sipp' => 'https://sipp.ms-kualasimpang.go.id/',
            'maps' => 'https://goo.gl/maps/vYLgGotLbW4t7Bqc7',
        ]);

        User::create([
            'id' => '11143',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acgay1',
            'nama_pengadilan' => 'Mahkamah Syariah Blangkajeren',
            'username' => 'mahkamah_syariah_blangkajeren',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms blangkejeren.jpg',
            'alamat' => 'Jl. Inen Mayak Teri, Sp. Reli, X8WH+CWP, Kp. Jawa, Kec. Blangkejeren, Kabupaten Gayo Lues, Aceh 24655',
            'longitude' => '97.32982',
            'latitude' => '3.99608',
            'website' => 'http://ms-blangkejeren.go.id',
            'sipp' => 'http://sipp.ms-blangkejeren.go.id/',
            'maps' => 'https://goo.gl/maps/npmyzQC6XUXnZUPg8',
        ]);

        User::create([
            'id' => '11144',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acsbs1',
            'nama_pengadilan' => 'Mahkamah Syariah Kota Subulussalam',
            'username' => 'mahkamah_syariah_kota_subulussalam',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms kota subulussalam.jpg',
            'alamat' => 'Penanggalan, Kec. Penanggalan, Kota Subulussalam, Aceh 24780',
            'longitude' => '98.02383',
            'latitude' => '2.62755',
            'website' => 'http://www.ms-kotasubulussalam.go.id',
            'sipp' => 'http://sipp.ms-kotasubulussalam.go.id/',
            'maps' => 'https://goo.gl/maps/5VCt3Nb39rtJfQjW9',
        ]);

        User::create([
            'id' => '11145',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acbar1',
            'nama_pengadilan' => 'Mahkamah Syariah Meulaboh',
            'username' => 'mahkamah_syariah_meulaboh',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms meulaboh.jpg',
            'alamat' => 'Paya Peunaga, Kec. Meureubo, Kabupaten Aceh Barat, Aceh 23681',
            'longitude' => '96.16815',
            'latitude' => '4.13826',
            'website' => 'http://ms-meulaboh.go.id',
            'sipp' => 'http://sipp.ms-meulaboh.go.id/',
            'maps' => 'https://goo.gl/maps/herpnBePU7Dkwfe5A',
        ]);

        User::create([
            'id' => '11146',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acjay1',
            'nama_pengadilan' => 'Mahkamah Syariah Calang',
            'username' => 'mahkamah_syariah_calang',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms calang.jpg',
            'alamat' => 'Kp. Blang, Kec. Krueng Sabee, Kabupaten Aceh Jaya, Aceh 23655',
            'longitude' => '95.58743',
            'latitude' => '4.64094',
            'website' => 'http://www.ms-calang.go.id',
            'sipp' => 'https://sipp.ms-calang.go.id/',
            'maps' => 'https://goo.gl/maps/pQSe1jsEQ9TxUHwp6',
        ]);

        User::create([
            'id' => '11147',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acgar1',
            'nama_pengadilan' => 'Mahkamah Syariah Kutacane',
            'username' => 'mahkamah_syariah_kutacane',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms kutacane.jpg',
            'alamat' => 'JL Teuku Bedussamad No.259, Pulo Sanggar, Kec. Babussalam, Kabupaten Aceh Tenggara, Aceh 24651',
            'longitude' => '97.81484',
            'latitude' => '3.47326',
            'website' => 'http://pn-kutacane.go.id/',
            'sipp' => 'https://sipp.ms-kutacane.go.id/',
            'maps' => 'https://goo.gl/maps/wrXNAi43bk9JXMpP9',
        ]);

        User::create([
            'id' => '11148',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acsim1',
            'nama_pengadilan' => 'Mahkamah Syariah Sinabang',
            'username' => 'mahkamah_syariah_sinabang',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms sinabang.jpg',
            'alamat' => 'Jl. Tgk. Diujung Km. 5, Desa Suak Buluh, Nangroe, Darussalam, Suak Buluh, Aceh Besar, Kabupaten Simeulue, Aceh 24786',
            'longitude' => '96.37582',
            'latitude' => '2.44266',
            'website' => 'http://ms-sinabang.net',
            'sipp' => 'https://sipp.ms-tapaktuan.go.id/',
            'maps' => 'https://goo.gl/maps/DHhidrhbQsEk9Frw5',
        ]);

        User::create([
            'id' => '11149',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acsel1',
            'nama_pengadilan' => 'Mahkamah Syariah Tapaktuan',
            'username' => 'mahkamah_syariah_tapaktuan',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms tapaktuan.jpg',
            'alamat' => 'Jl. T. Ben Mahmud, Air Berudang, Kec. Tapak Tuan, Kabupaten Aceh Selatan, Aceh 23711',
            'longitude' => '97.93857',
            'latitude' => '2.27923',
            'website' => 'http://ms-tapaktuan.go.id',
            'sipp' => 'https://sipp.ms-tapaktuan.go.id/',
            'maps' => 'https://goo.gl/maps/4nmq6NUheRuTp4heA',
        ]);

        User::create([
            'id' => '11150',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acsin1',
            'nama_pengadilan' => 'Mahkamah Syariah Singkil',
            'username' => 'mahkamah_syariah_singkil',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms singkil.jpg',
            'alamat' => 'Jl. Singkil - Rimo No.Km. 20, Ketapang Indah, Kec. Singkil, Kabupaten Aceh Singkil, Aceh 23785',
            'longitude' => '97.93857',
            'latitude' => '2.27923',
            'website' => 'http://ms-singkil.go.id',
            'sipp' => 'https://sipp.ms-singkil.go.id/',
            'maps' => 'https://goo.gl/maps/ycacLBCZ17bEoMPD7',
        ]);

        User::create([
            'id' => '11151',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acbes1',
            'nama_pengadilan' => 'Mahkamah Syariah Jantho',
            'username' => 'mahkamah_syariah_jantho',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms jantho.jpg',
            'alamat' => 'Jantho Makmur, Kec. Kota Jantho, Kabupaten Aceh Besar, Aceh 23951',
            'longitude' => '96.85132',
            'latitude' => '3.74213',
            'website' => 'http://ms-jantho.go.id',
            'sipp' => 'https://sipp.ms-jantho.go.id/',
            'maps' => 'https://goo.gl/maps/dZsWWXtN2VhvdS1H9',
        ]);

        User::create([
            'id' => '11152',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acbdy1',
            'nama_pengadilan' => 'Mahkamah Syariah Blangpidie',
            'username' => 'mahkamah_syariah_blangpidie',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms blangpidie.jpg',
            'alamat' => 'Mata Ie, Kecamaten Blang Pidie, Kabupaten Aceh Barat Daya, Aceh 23763',
            'longitude' => '95.59661',
            'latitude' => '5.29807',
            'website' => 'http://www.ms-blangpidie.go.id',
            'sipp' => 'http://sipp.ms-blangpidie.go.id/',
            'maps' => 'https://goo.gl/maps/vVUvA2eDGrP84xG36',
        ]);

        User::create([
            'id' => '11153',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acngn1',
            'nama_pengadilan' => 'Mahkamah Syariah Sukamakmue',
            'username' => 'mahkamah_syariah_sukamakmue',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms suka makmue.jpg',
            'alamat' => 'Jln. Paduka Yang Mulia Presiden Soekarno, Komplek Perkantoran, Kec. Suka Makmue, Kabupaten Nagan Raya, Aceh 23671',
            'longitude' => '96.32368',
            'latitude' => '4.15829',
            'website' => 'http://ms-sukamakmue.go.id',
            'sipp' => 'https://sippweb.ms-sukamakmue.go.id/',
            'maps' => 'https://goo.gl/maps/6jwyZ4DdEaZVT9Bz7',
        ]);

        User::create([
            'id' => '11154',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acbme1',
            'nama_pengadilan' => 'Mahkamah Syariah Simpang Tiga Redelong',
            'username' => 'mahkamah_syariah_simpang_tiga_redelong',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms simpang tiga redelong.jpg',
            'alamat' => 'Pante Raya, Kec. Wih Pesam, Kabupaten Bener Meriah, Aceh 24471',
            'longitude' => '96.80284',
            'latitude' => '4.72668',
            'website' => 'https://pn-simpangtigaredelong.go.id/',
            'sipp' => 'http://sipp.ms-simpangtigaredelong.go.id/',
            'maps' => 'https://goo.gl/maps/8W8z7XEmgj9bWHaq6',
        ]);

        User::create([
            'id' => '11155',
            'kode_jenis_id' => 'acehpa',
            'kode_kab_id' => 'acpid1',
            'nama_pengadilan' => 'Mahkamah Syariah Meureudu',
            'username' => 'mahkamah_syariah_meureudu',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ms meureudu.jpg',
            'alamat' => 'Jl. Banda Aceh-Medan,, Kec. Meureudu, Manyang Lancok, Kec. Meureudu, Kabupaten Pidie Jaya, Aceh',
            'longitude' => '96.24429',
            'latitude' => '5.2271',
            'website' => 'http://www.ms-meureudu.go.id',
            'sipp' => 'http://sipp.ms-meureudu.go.id/',
            'maps' => 'https://goo.gl/maps/mJZ41NcDoGP3cMT58',
        ]);

        User::create([
            'id' => '11156',
            'kode_jenis_id' => 'acehptun',
            'kode_kab_id' => 'acban1',
            'nama_pengadilan' => 'Pengadilan Tata Usaha Negara Banda Aceh',
            'username' => 'pengadilan_tata_usaha_negara_banda_aceh',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/ptun banda aceh.jpg',
            'alamat' => 'Jl. Ir. Moh. Taher No.25, Lueng Bata, Kec. Lueng Bata, Kota Banda Aceh, Aceh 23247',
            'longitude' => '95.3387',
            'latitude' => '5.53703',
            'website' => 'http://ptun-bandaaceh.go.id/',
            'sipp' => 'http://sipp.ptun-bandaaceh.go.id/',
            'maps' => 'https://goo.gl/maps/6HUsnmGifRKh1yFs6',
        ]);

        User::create([
            'id' => '11157',
            'kode_jenis_id' => 'acehpm',
            'kode_kab_id' => 'acban1',
            'nama_pengadilan' => 'Pengadilan Militer Banda Aceh',
            'username' => 'pengadilan_militer_banda_aceh',
            'password' => Hash::make('12345'),
            'gambar' => 'gambar-pengadilan/pm banda aceh.jpg',
            'alamat' => 'JL. Tengku Imum No.108, Blang Cut, Lueng Bata, Banda Aceh City, Aceh 23127',
            'longitude' => '95.33536',
            'latitude' => '5.54365',
            'website' => 'https://dilmil-aceh.go.id/',
            'sipp' => 'https://sipp.dilmil-aceh.go.id/',
            'maps' => 'https://goo.gl/maps/NWhEq3aKgC1RzNpL6',
        ]);
    }
}

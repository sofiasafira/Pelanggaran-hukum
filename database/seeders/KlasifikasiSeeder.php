<?php

namespace Database\Seeders;

use App\Models\Klasifikasi;
use Illuminate\Database\Seeder;

class KlasifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Klasifikasi::create([
            'kode_klasifikasi' => 'narkot',
            'nama_klasifikasi' => 'Narkotika dan Psikotropika',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'kropsi',
            'nama_klasifikasi' => 'Korupsi',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'perabh',
            'nama_klasifikasi' => 'Peradilan Anaka ABH',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'kdrt',
            'nama_klasifikasi' => 'KDRT',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'linhdp',
            'nama_klasifikasi' => 'Lingkungan Hidup',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'ite',
            'nama_klasifikasi' => 'ITE',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'anak',
            'nama_klasifikasi' => 'Anak',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'kpbnan',
            'nama_klasifikasi' => 'Kepabeanan',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'prpjkn',
            'nama_klasifikasi' => 'Perpajakan',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'mtauag',
            'nama_klasifikasi' => 'Mata Uang',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'perorg',
            'nama_klasifikasi' => 'Perdagangan Orang',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'uagpls',
            'nama_klasifikasi' => 'Uang Palsu',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'pncuag',
            'nama_klasifikasi' => 'Pencucian Uang',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'prtmbgn',
            'nama_klasifikasi' => 'Pertambangan',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'playrn',
            'nama_klasifikasi' => 'Pelayaran',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'prngrfi',
            'nama_klasifikasi' => 'Pornografi',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'prbnkn',
            'nama_klasifikasi' => 'Perbankan',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'lainlaina',
            'nama_klasifikasi' => 'Lain-lain',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'prmhnn',
            'nama_klasifikasi' => 'Permohonan',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpa',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'disersi',
            'nama_klasifikasi' => 'Disersi',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpm',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'ksusilaan',
            'nama_klasifikasi' => 'Kesusilaan',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpm',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'sbordisi',
            'nama_klasifikasi' => 'Subordinasi',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpm',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'logging',
            'nama_klasifikasi' => 'Illegal Logging',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpm',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'snjtapi',
            'nama_klasifikasi' => 'Senjata Api',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehpm',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'likhip',
            'nama_klasifikasi' => 'Lingkungan Hidup',
            'kode_direktori_id' => 'dir01',
            'kode_jenis_id' => 'acehptun',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'pncurian',
            'nama_klasifikasi' => 'Pencurian',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'pnpuan',
            'nama_klasifikasi' => 'Penipuan',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'pngniayaan',
            'nama_klasifikasi' => 'Penganiayaan',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'pggelapan',
            'nama_klasifikasi' => 'Penggelapan',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'ketekem',
            'nama_klasifikasi' => 'Kejahatan Terhadap Keamanan',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'pnghnaan',
            'nama_klasifikasi' => 'Penghinaan',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'pmrsn',
            'nama_klasifikasi' => 'Pemerasan dan Pengancaman',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'pmlsuan',
            'nama_klasifikasi' => 'Pemalsuan',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'kejterum',
            'nama_klasifikasi' => 'Kejahatan Terhadap Ketertiban Umum',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'kejterauper',
            'nama_klasifikasi' => 'Kejahatan Terhadap asal usul perkawinan',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'kejterkes',
            'nama_klasifikasi' => 'Kejahatan terhadap kesusilaan',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'kejtermer',
            'nama_klasifikasi' => 'Kejahatan terhadap kemerdekaan orang lain',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'prjdian',
            'nama_klasifikasi' => 'Perjudian',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'prskan',
            'nama_klasifikasi' => 'Perusakan',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'khtnn',
            'nama_klasifikasi' => 'Kehutanan',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'pmbnhn',
            'nama_klasifikasi' => 'Pembunuhan',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'kekmluka',
            'nama_klasifikasi' => 'Kealfaan mengakibatkan kematian luka',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'lalulin',
            'nama_klasifikasi' => 'Lalu lintas',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'sphplsu',
            'nama_klasifikasi' => 'Sumpah Palsu',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'jnyat',
            'nama_klasifikasi' => 'Jinayat',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpa',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'pnghinaan',
            'nama_klasifikasi' => 'Penghinaan',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpa',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'keternegara',
            'nama_klasifikasi' => 'Kejahatan Terhadap kemanan negara',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpa',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'keterorg',
            'nama_klasifikasi' => 'Kejahatan terhadap kemerdekaan orang lain',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpm',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'keternegra',
            'nama_klasifikasi' => 'Kejahatan terhadap keamanan negara',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpm',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'pngnyaan',
            'nama_klasifikasi' => 'Penganiayaan',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpm',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'kejterumum',
            'nama_klasifikasi' => 'Kejahatan Terhadap Ketertiban Umum',
            'kode_direktori_id' => 'dir02',
            'kode_jenis_id' => 'acehpm',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'permelhukum',
            'nama_klasifikasi' => 'Perbuatan melawan hukum',
            'kode_direktori_id' => 'dir03',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'wnprestasi',
            'nama_klasifikasi' => 'Wanprestasi',
            'kode_direktori_id' => 'dir03',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'prjnjian',
            'nama_klasifikasi' => 'Perjanjian',
            'kode_direktori_id' => 'dir03',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'tanah',
            'nama_klasifikasi' => 'Tanah',
            'kode_direktori_id' => 'dir03',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'prmohnn',
            'nama_klasifikasi' => 'Permohonan',
            'kode_direktori_id' => 'dir03',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'waris',
            'nama_klasifikasi' => 'Waris',
            'kode_direktori_id' => 'dir03',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'lainlainc',
            'nama_klasifikasi' => 'Lain-lain',
            'kode_direktori_id' => 'dir03',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'warisb',
            'nama_klasifikasi' => 'Waris',
            'kode_direktori_id' => 'dir03',
            'kode_jenis_id' => 'acehpa',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'pmbgianhrta',
            'nama_klasifikasi' => 'Pembagian harta',
            'kode_direktori_id' => 'dir03',
            'kode_jenis_id' => 'acehpa',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'lainlainb',
            'nama_klasifikasi' => 'Lain-lain',
            'kode_direktori_id' => 'dir03',
            'kode_jenis_id' => 'acehpa',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'prcraian',
            'nama_klasifikasi' => 'Perceraian',
            'kode_direktori_id' => 'dir04',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'prcraianb',
            'nama_klasifikasi' => 'Perceraian',
            'kode_direktori_id' => 'dir04',
            'kode_jenis_id' => 'acehpa',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'warisislm',
            'nama_klasifikasi' => 'Waris Islam',
            'kode_direktori_id' => 'dir04',
            'kode_jenis_id' => 'acehpa',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'pgshnnkah',
            'nama_klasifikasi' => 'Pengesahan Nikah',
            'kode_direktori_id' => 'dir04',
            'kode_jenis_id' => 'acehpa',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'hrtabrsm',
            'nama_klasifikasi' => 'Harta Bersama',
            'kode_direktori_id' => 'dir04',
            'kode_jenis_id' => 'acehpa',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'prwalian',
            'nama_klasifikasi' => 'Perwalian',
            'kode_direktori_id' => 'dir04',
            'kode_jenis_id' => 'acehpa',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'hibah',
            'nama_klasifikasi' => 'Hibah',
            'kode_direktori_id' => 'dir04',
            'kode_jenis_id' => 'acehpa',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'pmbtlnnkh',
            'nama_klasifikasi' => 'Pembatalan Nikah',
            'kode_direktori_id' => 'dir04',
            'kode_jenis_id' => 'acehpa',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'iznpolgmi',
            'nama_klasifikasi' => 'Izin Poligami',
            'kode_direktori_id' => 'dir04',
            'kode_jenis_id' => 'acehpa',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'wakaf',
            'nama_klasifikasi' => 'Wakaf',
            'kode_direktori_id' => 'dir04',
            'kode_jenis_id' => 'acehpa',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'wasiat',
            'nama_klasifikasi' => 'Wasiat',
            'kode_direktori_id' => 'dir04',
            'kode_jenis_id' => 'acehpa',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'lainlaind',
            'nama_klasifikasi' => 'Lain-lain',
            'kode_direktori_id' => 'dir04',
            'kode_jenis_id' => 'acehpa',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'kpgwaian',
            'nama_klasifikasi' => 'Kepegawaian',
            'kode_direktori_id' => 'dir05',
            'kode_jenis_id' => 'acehptun',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'prtnahan',
            'nama_klasifikasi' => 'Pertanahan',
            'kode_direktori_id' => 'dir05',
            'kode_jenis_id' => 'acehptun',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'tender',
            'nama_klasifikasi' => 'Tender',
            'kode_direktori_id' => 'dir05',
            'kode_jenis_id' => 'acehptun',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'perijinan',
            'nama_klasifikasi' => 'Perijinan',
            'kode_direktori_id' => 'dir05',
            'kode_jenis_id' => 'acehptun',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'lelang',
            'nama_klasifikasi' => 'Lelang',
            'kode_direktori_id' => 'dir05',
            'kode_jenis_id' => 'acehptun',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'prtaipol',
            'nama_klasifikasi' => 'Partai Politik',
            'kode_direktori_id' => 'dir05',
            'kode_jenis_id' => 'acehptun',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'kip',
            'nama_klasifikasi' => 'KIP',
            'kode_direktori_id' => 'dir05',
            'kode_jenis_id' => 'acehptun',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'prmhnn1',
            'nama_klasifikasi' => 'Perumahan',
            'kode_direktori_id' => 'dir05',
            'kode_jenis_id' => 'acehptun',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'pajak',
            'nama_klasifikasi' => 'Pajak',
            'kode_direktori_id' => 'dir05',
            'kode_jenis_id' => 'acehptun',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'lainlaine',
            'nama_klasifikasi' => 'Lain-lain',
            'kode_direktori_id' => 'dir05',
            'kode_jenis_id' => 'acehptun',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'phi',
            'nama_klasifikasi' => 'PHI',
            'kode_direktori_id' => 'dir06',
            'kode_jenis_id' => 'acehpu',
        ]);

        Klasifikasi::create([
            'kode_klasifikasi' => 'parpol',
            'nama_klasifikasi' => 'Parpol',
            'kode_direktori_id' => 'dir06',
            'kode_jenis_id' => 'acehpu',
        ]);
    }
}

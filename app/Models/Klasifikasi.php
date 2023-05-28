<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $primaryKey = 'kode_klasifikasi';


    public function jenis_pengadilan()
    {
        return $this->belongsTo(JenisPengadilan::class);
    }

    public function direktoris()
    {
        return $this->belongsTo(Direktori::class, 'kode_direktori_id', 'kode_direktori');
    }

    public function data_pelanggaran()
    {
        return $this->hasMany(DataPelanggaran::class);
    }
}

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

    public function direktori()
    {
        return $this->belongsTo(Direktori::class);
    }

    public function data_pelanggaran()
    {
        return $this->hasMany(DataPelanggaran::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direktori extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $primaryKey = 'kode_direktori';

    public function data_pelanggaran()
    {
        return $this->hasMany(DataPelanggaran::class);
    }

    public function klasifikasi()
    {
        return $this->hasMany(Klasifikasi::class);
    }
}

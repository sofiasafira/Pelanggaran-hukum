<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kecamatans()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function data_pelanggaran()
    {
        return $this->hasMany(DataPelanggaran::class);
    }
}


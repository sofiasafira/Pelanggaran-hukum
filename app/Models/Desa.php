<?php
 
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    // protected $primaryKey = 'kode_des';

    protected $fillable = [
        'geojson_des'// tambahkan kolom ini ke daftar fillable
    ];


    public function kecamatans()
    {
        return $this->belongsTo(Kecamatan::class, 'kode_kec_id', 'kode_kec');
    }

    public function data_pelanggaran()
    {
        return $this->hasMany(DataPelanggaran::class);
    }
}


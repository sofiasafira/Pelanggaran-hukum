<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_kec';

    protected $fillable = [
        'geojson_kec'// tambahkan kolom ini ke daftar fillable
    ];


    public function desas()
    {
        return $this->hasMany(Desa::class);
    }

    public function kabupatens()
    {
        return $this->belongsTo(Kabupaten::class, 'kode_kab_id', 'kode_kab');
    }

    public function getGeojsonKecAttribute()
    {
        // konversi field "geometry" dari database ke dalam format GeoJSON
        $geometry = json_decode($this->geometry);-
        $geojson = [
            'type' => 'Feature',
            'geometry' => $geometry,
            'properties' => [
                'kode_kec' => $this->kode_kec,
                'nama_kec' => $this->nama_kec,
            ],
        ];
        return json_encode($geojson);
    }
}




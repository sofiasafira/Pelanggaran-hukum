<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPelanggaran extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'kode_pelanggaran';
    public $incrementing = false;
    protected $keyType = 'string';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function direktori()
    {
        return $this->belongsTo(Direktori::class);
    }

    public function Klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class);
    }
}

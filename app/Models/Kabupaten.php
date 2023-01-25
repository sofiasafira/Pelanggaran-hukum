<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $primaryKey = 'kode_kab';

    public function user()
    {
        return $this->hasMany(User::class);
    }
}

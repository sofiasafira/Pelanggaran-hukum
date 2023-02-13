<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facedes\DB;

class TitikModel extends Model
{
    public function allData(){
        $results = DB::table('lokasipengadilan')
            ->select('nama', 'latitude', 'longitude')
            ->get();
        return $results;
    }
}
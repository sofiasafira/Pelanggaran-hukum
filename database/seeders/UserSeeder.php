<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str; 
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'nama_pengadilan' => 'Pengadilan Negeri Sabang',
            'username' => 'pn_sabang',
            'email' => 'pn_sabang@gmail.com',
            'password' => bcrypt('sabang'),
            'remember_token' => Str::random(60),

        ]);
    }
}

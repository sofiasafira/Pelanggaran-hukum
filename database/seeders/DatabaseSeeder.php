<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            DataPelanggaranSeeder::class,
            DirektoriSeeder::class,
            JenisPengadilanSeeder::class,
            KabupatenSeeder::class,
            KlasifikasiSeeder::class,
            UserSeeder::class,
            KecamatanSeeder::class,
            DesaSeeder::class,
        ]);
    }
}

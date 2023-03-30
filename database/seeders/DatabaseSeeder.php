<?php

namespace Database\Seeders;

use App\Models\Jawabanresponden;
use App\Models\Pilihanjawaban;
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
        return $this->call([
            LayananSeeder::class,
            PertanyaanSeeder::class,
            PilihanJawabanSeeder::class,
            JawabanRespondenSeeder::class,
            UserSeeder::class
        ]);
    }
}

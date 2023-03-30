<?php

namespace Database\Seeders;

use App\Models\Pilihanjawaban;
use Illuminate\Database\Seeder;

class PilihanJawabanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pilihanjawaban::factory()->count(10)->create();

    }
}

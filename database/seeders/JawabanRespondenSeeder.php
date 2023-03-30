<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jawabanresponden;

class JawabanRespondenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jawabanresponden::factory()->count(10)->create();
    }
}

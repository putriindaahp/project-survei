<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pilihanjawaban;

class PilihanJawabanFactory extends Factory
{
    protected $model = Pilihanjawaban::class;

    public function definition()
    {
        return [
            'pilihan_jawaban' => $this->faker->word(),
            'poin' => mt_rand(1,4),
            'pertanyaan_id' => mt_rand(1,5)
        ];
    }
}

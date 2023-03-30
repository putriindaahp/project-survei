<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pertanyaan;

class PertanyaanFactory extends Factory
{
    protected $model = Pertanyaan::class;

    public function definition()
    {
        return [
            'pertanyaan' => $this->faker->sentence(),
            'is_active' => mt_rand(0,1),
            'layanan_id' => mt_rand(1,4)
        ];
    }
}

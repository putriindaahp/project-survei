<?php

namespace Database\Factories;

use App\Models\Jawabanresponden;
use Illuminate\Database\Eloquent\Factories\Factory;

class JawabanRespondenFactory extends Factory
{
    protected $model = Jawabanresponden::class;

    public function definition()
    {
        $kategoriresponden = ['Instansi (K/L) Pusat', 'Provinsi Se-Indonesia', 'Kab-Kota di Jawa Timur', 'BUMN-BUMD'];
        return [
            'total_points' => mt_rand(20, 100),
            'layanan_id' => mt_rand(1, 4),
            'profil' => json_encode([
                'nama' => $this->faker->name(),
                'email' => $this->faker->unique()->safeEmail,
                'no_hp' => $this->faker->word(),
                'usia' => mt_rand(25, 60),
                'gender' => $this->faker->word(),
                'kategori_responden' => $kategoriresponden[array_rand($kategoriresponden, 1)],
                'jabatan' => $this->faker->word(),
                'pendidikan' => $this->faker->word(),
            ]),
        ];
    }
}
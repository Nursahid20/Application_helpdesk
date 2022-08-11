<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = $this->faker->randomElement($array = array('Laki-laki', 'Perempuan'));
        return [
            'departemen_id' => mt_rand(2, 6),
            'jabatan_id' => mt_rand(2, 6),
            'nama' => $this->faker->name($gender),
            'email' => $this->faker->email(),
            'nik' => $this->faker->numerify('##########'),
            'alamat' => $this->faker->address(),
            'blok' => mt_rand(1, 4),
            'jk' => $gender,
            'tanggal_lahir' => $this->faker->secondaryAddress(),
            'tempat_lahir' => $this->faker->city(),
            'no_telepon' => $this->faker->phoneNumber(),
            'img_profile' => 'default.png',
            'slug' => $this->faker->slug()
        ];
    }
}

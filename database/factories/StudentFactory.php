<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => $this->faker->unique()->numerify('2023###'), // NIS unik
            'nama' => $this->faker->name, // Nama acak
            'alamat' => $this->faker->address, // Alamat acak
            'no_hp' => $this->faker->phoneNumber, // Nomor telepon acak
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']), // Jenis kelamin acak
            'hobi' => $this->faker->word, // Hobi acak
        ];
    }
}

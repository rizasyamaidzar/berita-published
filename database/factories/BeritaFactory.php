<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        //
        $names = ['-Kj9QY.png', '-Kj9QY.png', '-Kj9QY.png', '-Kj9QY.png', '-Kj9QY.png'];
        $status = ['Published', 'Draft'];
        return [
            'judul' => fake()->name(),
            'tanggal' => fake()->date(),
            'cover' => $this->faker->randomElement($names),
            'artikel' => fake()->paragraph(20, true),
            'category_id' => $this->faker->numberBetween(1, 5),
            'status' => $this->faker->randomElement($status),
            //
        ];
    }
}

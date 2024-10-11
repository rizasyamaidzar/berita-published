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
        $names = ['berita1.jpeg', 'berita2.jpeg', 'berita3.jpeg', 'berita4.jpeg', 'berita5.jpeg', 'berita6.jpeg', 'berita5.jpg', 'berita7.png', 'berita9.png'];
        $status = ['Published', 'Draft'];
        return [
            'judul' => fake()->name(),
            'tanggal' => fake()->date(),
            'cover' => $this->faker->randomElement($names),
            'artikel' => fake()->paragraph(20, true),
            'category_id' => $this->faker->numberBetween(1, 5),
            'status' => $this->faker->randomElement($status),
        ];
    }
}

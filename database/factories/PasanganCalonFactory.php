<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PasanganCalon>
 */
class PasanganCalonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'norut' => fake()->unique()->numberBetween(1, 2),
            'pasangan_calon' => fake()->name(),
            'picture'=>fake()->word(),
        ];
    }
}

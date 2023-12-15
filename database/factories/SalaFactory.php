<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SalaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'numero' => function () {
                // Gere números no formato 3.1.x
                return "5.1." . $this->faker->unique()->randomNumber(0,30);
            },
            'tipo' => $this->faker->randomElement(['normal', 'laboratorial','informatica']),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BlocoFactory extends Factory
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
            'partDoDia' => $this->fake()->randomElement(['manhã', 'tarde', 'noite']),
            'diaDaSemana' => $this->fake()->randomElement(['segunda-feira', 'terça-feira', 'quarta-feira', 'quinta-feira', 'sexta-feira']),


        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UnidadeCurricularFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => fake()->unique()->randomNumber(),
            'name' => fake()->name(),
            'acn' => fake()->word(),
            'horas' => fake()->numberBetween(1, 100),
            'LaboratorioObrigatorio' => fake()->boolean,
            'LaboratorioPreferencial' => fake()->boolean,
            'software' => fake()->word,
            'salaAvaliacao' => fake()->word,
            'numFuncDocResponsavel' => fake()->unique()->randomNumber(),
        ];
    }
}

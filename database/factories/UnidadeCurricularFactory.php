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

        $laboratorioObrigatorio = $this->faker->boolean;
        $laboratorioPreferencial = $laboratorioObrigatorio ? false : $this->faker->boolean;
        return [
            'codigo' => fake()->unique()->numberBetween(),
            'name' => fake()->name(),
            'acn' => fake()->word(),
            'horas' => fake()->numberBetween(1, 100),
            'LaboratorioObrigatorio' => $laboratorioObrigatorio,
            'LaboratorioPreferencial' => $laboratorioPreferencial,
            'software' => fake()->word,
            'salaAvaliacao' => fake()->word,

        ];
    }
}

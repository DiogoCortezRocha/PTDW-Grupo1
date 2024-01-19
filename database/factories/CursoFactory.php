<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
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
            'codigo' => fake()->unique()->numberBetween(),
            'name' => $this->faker->unique()->randomElement(['Tecnologias da Informação','Secretariado e Comunicação Empresarial','Gestão Pública','Gestão da Qualidade','Gestão Comercial','Eletrónica e Mecânica Industrial','Assessoria de Direção e Comunicação nas Organizações','Engenharia de Manutenção Industrial','Engenharia Mecatrónica','Gestão Comercial','Gestão da Qualidade Total','Gestão e Negócios Digitais','Informática Aplicada']),
        ];
    }
}

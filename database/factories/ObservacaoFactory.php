<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ObservacaoFactory extends Factory
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
            'numeroFuncionario'=>User::all()->random()->numeroFuncionario,
            'obsDocente'=>$this->faker->text,
            'obsComissaoHorarios'=>$this->faker->text,
        ];
    }
}

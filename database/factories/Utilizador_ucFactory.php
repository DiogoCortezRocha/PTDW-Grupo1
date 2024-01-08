<?php

namespace Database\Factories;

use App\Models\UnidadeCurricular;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Utilizador_uc>
 */
class Utilizador_ucFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

           'numeroFuncionario'=>User::where('tipoUtilizador', 'docente')->orWhere('tipoUtilizador', 'ambos')->get()->random()->numeroFuncionario,
           'codigoUC'=>UnidadeCurricular::all()->random()->codigo,
           'percentagem'=>fake()->paragraph(),
           'docenteresponsavel'=>fake()->boolean()
        ];
    }
}

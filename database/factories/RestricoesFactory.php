<?php

namespace Database\Factories;

use App\Models\Bloco;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RestricoesFactory extends Factory
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
            'idBloco'=>Bloco::all()->random()->id,
        ];
    }
}

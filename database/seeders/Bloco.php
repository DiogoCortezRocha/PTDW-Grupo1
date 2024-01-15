<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Bloco extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $partesDoDia = ['manhã', 'tarde', 'noite'];
        $diasDaSemana = ['segunda-feira', 'terça-feira', 'quarta-feira', 'quinta-feira', 'sexta-feira', 'sabado'];

        $sequencial = 1;

        foreach ($partesDoDia as $parteDoDia) {
            foreach ($diasDaSemana as $diaDaSemana) {
                DB::table('Bloco')->insert([
                    'partDoDia' => $parteDoDia,
                    'diaDaSemana' => $diaDaSemana,
                ]);

                $sequencial++;
            }
        }
    }
}

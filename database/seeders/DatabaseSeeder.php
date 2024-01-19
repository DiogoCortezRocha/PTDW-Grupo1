<?php

namespace Database\Seeders;


use Database\Factories\RestricoesFactory;
use Database\Factories\SalaFactory;
use Database\Factories\UnidadeCurricularFactory;
use Database\Factories\Utilizador_ucFactory;
use Illuminate\Database\Seeder;
use Illuminate\Database\QueryException;
use Database\Factories\ObservacaoFactory;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Users
        $this->call([UsersTableSeeder::class]);
        \App\Models\User::factory(5)->create();

        //Unidades Curriculares
        UnidadeCurricularFactory::new()->count(10)->create();


        //Utilizador_uc
        for ($i = 0; $i < 5; $i++) {
            try {
                Utilizador_ucFactory::new()->create();
            } catch (QueryException $e) {
            }
        }

        //Salas
        SalaFactory::new()->count(5)->create();

        //Blocos
        $this->call([Bloco::class]);

        //Restricoes
        for ($i = 0; $i < 12; $i++) {
            try {
                RestricoesFactory::new()->create();
            } catch (QueryException $e) {
            }
        }
        //observacoes

       for ($i = 0; $i < 5; $i++) {
        try {
            ObservacaoFactory::new()->create();
        } catch (QueryException $e) {
        }
    }
    }
}

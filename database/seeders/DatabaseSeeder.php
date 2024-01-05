<?php

namespace Database\Seeders;

use Database\Factories\BlocoFactory;
use Database\Factories\RestricoesFactory;
use Database\Factories\SalaFactory;
use Database\Factories\UnidadeCurricularFactory;
use Database\Factories\Utilizador_ucFactory;
use Illuminate\Database\Seeder;
use Illuminate\Database\QueryException;

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

<<<<<<< HEAD
        //Blocos
        $this->call([Bloco::class]);

        //Restricoes
        for ($i = 0; $i < 12; $i++) {
            try {
                RestricoesFactory::new()->create();
            } catch (QueryException $e) {
            }
        }
=======
        //     for ($i=0; $i < 12; $i++) {
        //         try {
        //            RestricoesFactory::new()->create();
        //         } catch (QueryException $e) {

        //         }
        //     }


>>>>>>> 22f688cf856339197d1a4953be1dc5b2a99a9a92
    }
}

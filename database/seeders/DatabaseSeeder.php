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
        $this->call([UsersTableSeeder::class]);

        UnidadeCurricularFactory::new()->count(10)->create();
        for ($i=0; $i < 5; $i++) {
            try {
                Utilizador_ucFactory::new()->create();
            } catch (QueryException $e) {

            }
        }
        
           SalaFactory::new()->count(5)->create();
            $this->call([Bloco::class]);


            for ($i=0; $i < 12; $i++) {
                try {
                   RestricoesFactory::new()->create();
                } catch (QueryException $e) {

                }
            }


    }
}

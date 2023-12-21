<?php

namespace Database\Seeders;

use Database\Factories\BlocoFactory;
use Database\Factories\RestricoesFactory;
use Database\Factories\SalaFactory;
use Database\Factories\UnidadeCurricularFactory;

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
           SalaFactory::new()->count(5)->create();
            BlocoFactory::new()->count(5)->create();
            for ($i=0; $i < 10; $i++) {
                try {
                   RestricoesFactory::new()->create();
                } catch (QueryException $e) {

                }
            }


    }
}

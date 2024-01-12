<?php

namespace Database\Seeders;

<<<<<<< HEAD
=======
use Database\Factories\BlocoFactory;
use Database\Factories\cursoFactory;
>>>>>>> 807270b8f850ae6cd1a82e981c19e5fc28bd6b67
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
<<<<<<< HEAD
        \App\Models\User::factory(5)->create();

        //Unidades Curriculares
=======
        //cursoFactory::new()->count(10)->create();
>>>>>>> 807270b8f850ae6cd1a82e981c19e5fc28bd6b67
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
    }
}

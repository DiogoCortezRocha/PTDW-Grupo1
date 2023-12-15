<?php

namespace Database\Seeders;

use Database\Factories\BlocoFactory;
use Database\Factories\RestricoesFactory;
use Database\Factories\SalaFactory;
use Database\Factories\UnidadeCurricularFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

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
        /*
        UnidadeCurricularFactory::new()->count(10)->create();
            SalaFactory::new()->count(5)->create();
            BlocoFactory::new()->count(5)->create();
            RestricoesFactory::new()->count(5)->create();
        */
    }
}

<?php
namespace Database\Seeders;

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
       // $this->call([UsersTableSeeder::class]);
            UnidadeCurricularFactory::new()->count(10)->create();
    }
}

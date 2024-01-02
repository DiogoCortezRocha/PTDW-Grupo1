<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin Admin',
            'email' => 'admin@white.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
*/

        DB::table('users')->insert([
            'numeroFuncionario' => fake()->unique()->numberBetween(),
            'nome' => 'Diogo',
            'email' => 'diogo@ua.pt',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'telefone' => '123456789',
            'acn'   => 'ola',
            'tipoUtilizador' => 'Docente',

        ]);
        DB::table('users')->insert([
            'numeroFuncionario' => fake()->unique()->numberBetween(),
            'nome' => 'kika',
            'email' => 'kika@ua.pt',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'telefone' => '978564732',
            'acn'   => 'ola',
            'tipoUtilizador' => 'Docente',

        ]);
        

    }
}

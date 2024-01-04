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
            'nome' => 'Grupo1',
            'email' => 'Grupo1@ua.pt',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'telefone' => '123456789',
            'acn'   => 'ola',
            'tipoUtilizador' => 'ambos',

        ]);
        DB::table('users')->insert([
            'numeroFuncionario' => fake()->unique()->numberBetween(),
            'nome' => 'tony',
            'email' => 'tony@ua.pt',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'telefone' => '123456789',
            'acn'   => 'ola',
            'tipoUtilizador' => 'comissaoHorarios',

        ]);
    }
}

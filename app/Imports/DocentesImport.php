<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DocentesImport implements ToModel, WithUpserts, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function uniqueBy()
    {
        return ['numeroFuncionario', 'email'];
    }

    public function model(array $row)
    {
        return new User([
            'numeroFuncionario' => $row['numero'],
            'nome' => $row['nome'],
            'email' => $row['email'],
            'telefone' => $row['telefone'],
            'acn' => $row['acn'],
            'password' => Hash::make('1234'),
            'tipoUtilizador' => 'docente',
        ]);
    }
}

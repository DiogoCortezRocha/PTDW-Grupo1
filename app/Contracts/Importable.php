<?php

// app/Contracts/Importable.php

namespace App\Contracts;        

interface Importable
{
    public function import(array $data);
}
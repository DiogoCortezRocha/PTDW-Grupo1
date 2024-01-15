<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilizador_uc extends Model
{
    use HasFactory;
    protected $table = "Utilizador_UnidadeCurricular";
    public $timestamps = true;
    protected $primaryKey = ['numeroFuncionario', 'codigoUC'];
    public $incrementing = false;
    protected $fillable = ['numeroFuncionario', 'codigoUC', 'percentagem','docenteresponsavel','created_at','updated_at'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloco extends Model
{
    use HasFactory;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "Bloco";
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = "integer";

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;


    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "partDoDia",
        "diaDaSemana",

    ];

    /**
     * The Users that belong to the Bloco
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'Restricao', 'idBloco', 'numeroFuncionario');
    }


    // retorna as partes do dia diferntes que existem na base de dados

    public  function partesDoDia()
    {
        return $this->select('partDoDia')->distinct()->get();
    }

    // retorna os dias da semana diferentes que existem na base de dados

    public  function diasDaSemana()
    {
        return $this->select('diaDaSemana')->distinct()->get();
    }

    // retorna os blocos que existem na base de dados

    public  function blocos()
    {
        return $this->select('id')->distinct()->get();
    }
}

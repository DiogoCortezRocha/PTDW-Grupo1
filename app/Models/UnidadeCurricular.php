<?php

namespace App\Models;

use App\Http\Controllers\Utilizador_UnidadeCurricular;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Contracts\Importable;

class UnidadeCurricular extends Model implements Importable
{
    use HasFactory;

 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "UnidadeCurricular";
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'codigo';

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
    public $incrementing = false;


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
        "codigo",
        "acn",
        "name",
        "horas",
        "laboratorioObrigatorio",
        "laboratorioPreferencial",
        "software",
        "salaAvaliacao",
        "numFuncDocResponsavel"

    ];


        /**
     * the users that belong to the UnidadeCurricular
     *
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'Utilizador_UnidadeCurricular', 'codigoUC', 'numeroFuncionario');
    }

    public function utilizadores()
    {
        return $this->hasMany(Utilizador_uc::class, 'codigoUC', 'codigo');
    }

    public function import(array $data)
    {
        return $this->create($data);
    }
}

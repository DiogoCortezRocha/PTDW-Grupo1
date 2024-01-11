<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UnidadeCurricular extends Model
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




}

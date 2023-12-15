<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Sala extends Model
{
    use HasFactory;


 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "Sala";
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'numero';

     /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = "string";

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
       'numero',
       'tipo'

    ];


        /**
     * the unidadesCurriculares that belong to the sala
     *
     */
    public function unidadesCurriculares(): BelongsToMany
    {
        return $this->belongsToMany(UnidadeCurricular::class,'Sala_UnidadeCurricular','codigoUC','numeroSala');
    }



}

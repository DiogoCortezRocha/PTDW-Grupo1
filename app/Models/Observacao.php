<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Observacao extends Model
{
    use HasFactory;

    /* The table associated with the model.
    *
    * @var string
    */
    protected $table ='observacoes';
      /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'numeroFuncionario';

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
    public $timestamps = true;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numeroFuncionario',
        'obsDocente',
    ];

    /**
     * Get the user that owns the Observacao
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'numeroFuncionario', 'numeroFuncionario');
    }

}

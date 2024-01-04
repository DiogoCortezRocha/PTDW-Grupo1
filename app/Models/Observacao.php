<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observacao extends Model
{
    use HasFactory;

    /* The table associated with the model.
    *
    * @var string
    */
    protected $table ='observacoes';

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

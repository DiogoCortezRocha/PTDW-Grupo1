<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "users";
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey= 'numeroFuncionario';

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
     * @var array<int, string>
     */
    protected $fillable = [
        'numeroFuncionario',
        'nome',
        'email',
        'telefone',
        'password',
        'acn',
        'tipoUtilizador',
        'restricaoSubmetida'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * the UnidadeCurriculares that belong to the user
     *
     */
    public function unidadesCurriculares(): BelongsToMany
    {
        return $this->belongsToMany(UnidadeCurricular::class,'Utilizador_UnidadeCurricular','codigoUC','numeroFuncionario');
    }

    /**
     * The Blocos that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function blocos(): BelongsToMany
    {
        return $this->belongsToMany(Bloco::class, 'Restricao', 'numeroFuncionario', 'idBloco');
    }


    /**
     * Get the observacao associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function observacao(): HasOne
    {
        return $this->hasOne(Observacao::class, 'numeroFuncionario', 'numeroFuncionario');
    }
    public function todosNumerosFuncionariosENomes()
    {
        return $this->select('numeroFuncionario', 'nome')->get();
    }

}

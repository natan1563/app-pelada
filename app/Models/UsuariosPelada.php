<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuariosPelada extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomeEvento',
        'data',
        'hora',
        'local'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    protected $table = 'usuarios_pelada';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelada extends Model
{

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomeEvento',
        'data_hora',
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
}

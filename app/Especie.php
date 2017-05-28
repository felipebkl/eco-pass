<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    protected $primaryKey = 'idEspecie';
    protected $table = 'especies';
    protected $fillable = [
        'nomeCientifico',
        'nomePopular'
    ];

    public function passaro()
    {
        return $this->hasOne('App\Passaro'); // Changed form hasMany to hasOne
    }
}

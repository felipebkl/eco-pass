<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    protected $primaryKey = 'idsexo';
    protected $table = 'sexos';
    protected $fillable = [
        'sexo'
    ];
    public function passaro()
    {
        return $this->hasOne('App\Passaro'); // Changed form hasMany to hasOne
    }
}

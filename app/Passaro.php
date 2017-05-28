<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passaro extends Model
{
    protected $primaryKey = 'idPassaro';
    protected $table = 'passaros';
    protected $fillable = [
        'users_id',
        'especie_idEspecie',
        'sexo_idsexo',
        'anilha',
        'nome',
        'dataNasc',
        'idPai',
        'idMae',
        'status'
    ];
    public function sexo(){
        return $this->belongsTo(Sexo::class, 'sexo_idsexo');
    }
    public function user(){

        return $this->belongsTo(User::class, 'users_id');
    }
    public function especie(){

        return $this->belongsTo(Especie::class, 'especie_idEspecie');
    }

}

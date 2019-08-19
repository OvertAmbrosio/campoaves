<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre', 'slug', 'cuerpo'
    ];

    public function entradas(){
        return $this->hasMany(Entrada::class);
    }
}

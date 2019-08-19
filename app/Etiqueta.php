<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    protected $fillable = [
        'nombre', 'slug'
    ];

    public function entradas(){
        return $this->belongsToMany(Entrada::class);
    }
}

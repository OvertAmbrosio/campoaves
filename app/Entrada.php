<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{

    protected $fillable = [
        'user_id','categoria_id', 'nombre', 'slug', 'excerpt', 'cuerpo', 'estado', 'imagen'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function etiquetas(){
        return $this->belongsToMany(Etiqueta::class);
    }
}

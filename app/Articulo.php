<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
     protected $fillable = ['tipoProducto','categoria_id', 'articulo','descripcion','codigo','status','stock','pvp'];

      public function Categoria(){
        return $this->belongsTo(Categoria::class);
    }

}

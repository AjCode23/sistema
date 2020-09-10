<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $fillable=['cliente_id','orden_id','articulo_id','cantidad','pvp','descuento','status'];
    

     public function cliente(){
    	return $this->belongsTo(Cliente::class);
    }




     public function articulo(){
    	return $this->belongsTo(Articulo::class);
    }

    
}

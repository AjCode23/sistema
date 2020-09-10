<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngresoEquipo extends Model
{
    protected $fillable=["cliente_id","marca","articulo_id","modelo","descripcion","numero",'status','observaciones'];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

     public function articulo(){
        return $this->belongsTo(Articulo::class);
    }


     public function inspeccion(){
        return $this->hasOne(inspeccion::class);
    }


    public function inspecciones(){
        return $this->hasMany(inspeccion::class);
    }

}




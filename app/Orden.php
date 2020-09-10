<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $fillable =['condicion_id',
'asesor_id',
'fecha',
'impuesto',
'serie',
'comentario',
'status'];

protected $dates=['fecha'];
 public function cotizacion(){
        return $this->HasOne(Cotizacion::class);
    }


     public function cotizaciones(){
        return $this->HasMany(Cotizacion::class);
    }


    public function condicion(){
        return $this->belongsTo(CondicionPago::class);
    }


    public function asesor(){
        return $this->belongsTo(Asesor::class);
    }
    public function archivos(){
        return $this->hasMany(ArchivoCotizacion::class);
    }
}

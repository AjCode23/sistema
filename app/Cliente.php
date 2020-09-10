<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable=['asesor_id','user_id','tipoPersona','nombres','tipoDocumento','numDocumento','actPpal','email','status'];


    public function direccion(){
        return $this->hasOne(DirecionCliente::class);
    }


    public function ie(){
        return $this->hasOne(CltIE::class);
    }


     public function asesor(){
    	return $this->belongsTo(Asesor::class);
    }



     public function telefonos(){
        return $this->hasMany(TelfCliente::class);
    }


     public function tlf(){
        return $this->hasOne(TelfCliente::class);
    }


    


     public function bancos(){
        return $this->hasMany(ClienteBanco::class);
    }


    public function facturacion(){
        return $this->hasOne(CltDirFactura::class);
    }



    public function regimen(){
        return $this->hasOne(CltRegimen::class);
    }


    public function monedas(){
        return $this->hasMany(CltMoneda::class);
    }

     public function comercios(){
    	return $this->hasMany(ContactoComercial::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TelfCliente extends Model
{
    protected $fillable=['cliente_id', 'tipoTlf', 'numero','status'];
    

    public function cliente(){
    	return $this->belongsTo(Cliente::class);
    }
}

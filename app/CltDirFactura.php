<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CltDirFactura extends Model
{
    protected $fillable=['cliente_id','correo_fact','direccion_recib','fecha','status'];

    protected $dates=['fecha'];
}

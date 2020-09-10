<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CltRegimen extends Model
{
    protected $fillable=['regimen','resolucion','ciu','cliente_id','status'];
}

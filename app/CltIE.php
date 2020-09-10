<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CltIE extends Model
{
    protected $fillable=['cliente_id','activo','pasivo','patrimonio','ingreso','egreso','otros','status'];
}

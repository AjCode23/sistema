<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirecionCliente extends Model
{
    protected $fillable=[ 'cliente_id', 'direccion', 'pais', 'departamento', 'ciudad', 'cod_postal'];
}

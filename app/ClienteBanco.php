<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteBanco extends Model
{
    protected $fillable=['banco','cliente_id','cuenta','tipo_cuenta','status'];
}

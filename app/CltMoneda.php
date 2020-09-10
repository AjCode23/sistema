<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CltMoneda extends Model
{
    protected $fillable=['status','moneda','cliente_id'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactoComercial extends Model
{
    protected $fillable=['cliente_id', 'nombreComercial', 'emailContacto', 'tlfOficina', 'tlfPersonal', 'status'];
}

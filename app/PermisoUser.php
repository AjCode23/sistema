<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermisoUser extends Model
{
    protected $fillable=['permiso_id','user_id','status'];
}

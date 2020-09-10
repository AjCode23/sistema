<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspeccion extends Model
{
    protected $fillable=['data','ingreso_equipo_id','user_id','observacion','status'];


 public function user(){
        return $this->belongsTo(User::class);
    }

}

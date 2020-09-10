<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    


    public function cargo(){
    	return $this->belongsTo(Cargo::class);
    }
}

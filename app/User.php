<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Auth;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    
    protected $fillable = [ 'usuario','tipo_documento','num_documento','nombres','password','email','telefono','status','nivel','path' ,'direccion' 
    ];

    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

static function ver(){
     $this->table='clientes';
     return $this->table;
}
    public static function chart($year){
        $array=array(0,0,0,0,0,0,0,0,0,0,0,0);
        $meses=[1,2,3,4,5,6,7,8,9,10,11,12];
           $ventas=DB::select("SELECT count(*)as num,MONTH(created_at)as mes FROM users where created_at like '%{$year}%' GROUP BY MONTH(created_at) ");
         foreach ($ventas as $key) {
            $rp=array($key->mes-1=>$key->num);
             $array=array_replace($array,$rp);
         }

         return $array;
     }

    public function cliente(){
        return $this->hasOne(Cliente::class);
    }


    public function permisos(){
        return $this->hasMany(PermisoUser::class);
    }

    public function empleado(){
        return $this->HasOne(Empleado::class);
    }

    public function img(){
        return $this->belongsTo(ImgUser::class);
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }
}

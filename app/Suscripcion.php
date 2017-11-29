<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Suscripcion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'suscripcions';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion', 'id_institucion', 'id_users'];

    public static function insertar($descripcion,$idinst,$iduser){
        $exist = DB::table('suscripcions as s')
            ->select('s.id')
            ->where('s.id_users','=',$iduser)
            ->first();
        if($exist) {
            return $exist->id;
        }else{
            Suscripcion::create(array(
                'descripcion' => $descripcion,
                'id_institucion' => $idinst,
                'id_users' => $iduser
            ));
            return (DB::table('suscripcions')->select('id')->orderBy('id','desc')->first())->id;
        }
    }
}

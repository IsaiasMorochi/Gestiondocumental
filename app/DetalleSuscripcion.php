<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleSuscripcion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'detalle_suscripcions';

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
    protected $fillable = ['estado', 'id_institucion', 'id_suscripcion', 'id_documento','path'];

    public static function insertar($idinst,$idsuscrip,$path){
        DetalleSuscripcion::create(array(
            'estado'=>'1',
            'id_institucion'=>$idinst,
            'id_suscripcion'=>$idsuscrip,
            'id_documento'=>1,
            'path'=>$path
        ));
    }
}

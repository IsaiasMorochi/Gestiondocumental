<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        Suscripcion::create(array(
            'descripcion'=>$descripcion,
            'id_institucion'=>$idinst,
            '$id_users'=>$iduser
        ));
    }
}

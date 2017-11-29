<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Departamento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'departamentos';

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
    protected $fillable = ['id','nombre', 'id_institucion'];

    public function scope_getInstitucion($query)
    {
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $institucion= $_SESSION['institucion'];
        $institucion->id;

        $ins= $query->join('institucions as i','i.id','=','departamentos.id_institucion')
            ->where('i.id','=',$institucion->id)
            ->select('departamentos.id as id','departamentos.nombre as nombre','i.id as idins','i.nombre as nombreins')
            ->get();

        return $ins;
    }

    public function scope_getInstitucionSuper($query)
    {
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $institucion= $_SESSION['institucion'];
        $institucion->id;

        $ins= $query->join('institucions as i','i.id','=','departamentos.id_institucion')
            ->select('departamentos.id as id','departamentos.nombre as nombre','i.id as idins','i.nombre as nombreins')
            ->get();

        return $ins;
    }

    
}

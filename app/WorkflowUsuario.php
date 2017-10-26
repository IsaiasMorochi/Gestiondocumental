<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class WorkflowUsuario extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'workflow_usuarios';

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
    protected $fillable = ['descripcion', 'fecha', 'id_institucion', 'id_workflow', 'id_users'];

    public static function insertar($descrip,$idinst,$idwork,$iduser){
        WorkflowUsuario::create(array(
            'descripcion'=>$descrip,
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'id_institucion'=>$idinst,
            'id_workflow'=>$idwork,
            'id_users'=>$iduser
        ));
    }
    
}

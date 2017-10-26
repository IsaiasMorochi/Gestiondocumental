<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoPrivilegio extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'grupo_privilegios';

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
    protected $fillable = ['estado', 'id_institucion', 'id_grupo', 'id_privilegio'];

    
}

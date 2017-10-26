<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermisoDepartamento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permiso_departamentos';

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
    protected $fillable = ['estado', 'id_institucion', 'id_departamento', 'id_permiso'];

    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'historials';

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
    protected $fillable = ['fecha', 'hora', 'descripcionM', 'id_institucion', 'id_documento'];

    
}

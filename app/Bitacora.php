<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_bitacora', 'operacion','tabla','hora','usuario','idinstitucion'];

}

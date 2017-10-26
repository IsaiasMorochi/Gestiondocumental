<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'institucions';

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
    protected $fillable = ['nombre', 'nit', 'estado', 'tipo'];

    
}

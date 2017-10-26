<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitio extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sitios';

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
    protected $fillable = ['nombre', 'id_institucion', 'id_users'];

    
}

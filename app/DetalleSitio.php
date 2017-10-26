<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleSitio extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'detalle_sitios';

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
    protected $fillable = ['cargo', 'estadoU', 'id_institucion', 'id_comentario', 'id_users', 'id_sitio'];

    
}

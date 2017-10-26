<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleContenido extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'detalle_contenidos';

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
    protected $fillable = ['fecha', 'id_institucion', 'id_documento', 'id_directorio', 'id_sitio'];

    
}

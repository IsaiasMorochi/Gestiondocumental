<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirectorioDocumento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'directorio_documentos';

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
    protected $fillable = ['fecha', 'id_institucion', 'id_directorio', 'id_documento'];

    
}

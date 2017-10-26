<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'documentos';

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
    protected $fillable = ['descripcion', 'extension', 'id_institucion', 'id_documento', 'id_categoria', 'id_estado', 'id_users'];

    
}

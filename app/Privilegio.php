<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Privilegio extends Model
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
    protected $fillable = ['estado','id_grupo','id_cu','INSERTAR','MODIFICAR','ELIMINAR'];
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    public static function exist($idgrupo,$idcu){
        return  DB::table('grupo_privilegios as gp')
                        ->select('gp.id')
                        ->where('gp.id_grupo','=',$idgrupo)
                        ->where('gp.id_cu','=',$idcu)
                        ->first();
    }
    public static function insI($idgrupo,$idcu){
        Privilegio::create(array(
                'estado'=>'1',
                'id_grupo'=>$idgrupo,
                'id_cu'=>$idcu,
                'INSERTAR'=>1,
                'MODIFICAR'=>0,
                'ELIMINAR'=>0
            )
        );
    }
    public static function updI($id){
        DB::table('grupo_privilegios')->where('id',$id->id)
            ->update([
                'INSERTAR'=>1
            ]);
    }
    public static function insE($idgrupo,$idcu){
        Privilegio::create(array(
                'estado'=>'1',
                'id_grupo'=>$idgrupo,
                'id_cu'=>$idcu,
                'INSERTAR'=>0,
                'MODIFICAR'=>1,
                'ELIMINAR'=>0
            )
        );
    }
    public static function updE($id){
        DB::table('grupo_privilegios')->where('id',$id->id)
            ->update([
                'MODIFICAR'=>1
            ]);
    }
    public static function insD($idgrupo,$idcu){
        Privilegio::create(array(
                'estado'=>'1',
                'id_grupo'=>$idgrupo,
                'id_cu'=>$idcu,
                'INSERTAR'=>0,
                'MODIFICAR'=>0,
                'ELIMINAR'=>1
            )
        );
    }
    public static function updD($id){
        DB::table('grupo_privilegios')->where('id',$id->id)
            ->update([
                'ELIMINAR'=>1
            ]);
    }
    
}

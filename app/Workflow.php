<?php

namespace App;

use App\Http\Controllers\phpWordController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
class Workflow extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'workflows';

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
    protected $fillable = ['descripcion', 'porcentaje', 'fechaI', 'fechaF', 'prioridad', 'id_institucion', 'id_documento', 'id_users'];

    public static function insertar(Request $request){
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $var = $_SESSION['institucion'];
        $id = DB::table('users as u')->select('u.id')->where('u.email','=',$_SESSION['email'])->first();
        Workflow::create(array(
            'descripcion'=>$request->get('descripcion'),
            'porcentaje'=>$request->get('porcentaje'),
            'fechaI'=>$request->get('fechaI'),
            'fechaF'=>$request->get('fechaF'),
            'prioridad'=>$request->get('prioridad'),
            'id_institucion'=>$var->id,
            'id_documento'=>$request->get('id_documento'),
            'id_users'=>$id->id
        ));
        phpWordController::makeWord($request,$id->id);
        //phpWordController::makeWithTemplate($request,$id->id);
    }
}

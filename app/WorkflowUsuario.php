<?php

namespace App;

use App\Http\Controllers\WorkflowController;
use Dompdf\Exception;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class WorkflowUsuario extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'workflow_usuarios';

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
    protected $fillable = ['descripcion', 'fecha', 'id_institucion', 'id_workflow', 'id_users','path'];

    public static function insertar($descrip,$idinst,$idwork,$iduser,$nameWork){
        WorkflowUsuario::create(array(
            'descripcion'=>$descrip,
            'fecha'=>Carbon::now('America/La_Paz')->toDateString(),
            'id_institucion'=>$idinst,
            'id_workflow'=>$idwork,
            'id_users'=>$iduser,
            'path'=>$nameWork

        ));

    }

    public static function verificar($path){
        $users = DB::table('workflow_usuarios as wu')
            ->join('users as us','us.id','=','wu.id_users')
            ->select('us.token')
            ->where('wu.path','=',$path)
            ->get();
        $shared = DB::table('detalle_suscripcions as wu')
            ->join('suscripcions as s','s.id','=','wu.id_suscripcion')
            ->join('users as us','us.id','=','s.id_users')
            ->select('us.token')
            ->where('wu.path','=',$path)////aarreglar al momento de enviar el path desde filemanager cuando es del tipo shared
            ->get();
        $tokens = array();
        if($users->count()>0) {
            for ($i = 0; $i < sizeof($users); $i++) {
                $tokens = array_prepend($tokens, $users[$i]->token);
            }
            $message = array("message" => "Se ah modificado el contenido de workflow:" . $path);
                //WorkflowController::send_notification($tokens, $message);
        }
        $tokens=array();
        if($shared->count()>0) {
            for ($i = 0; $i < sizeof($shared); $i++) {
                $tokens = array_prepend($tokens, $shared[$i]->token);
            }
            $message = array("message" => "Se ah modificado el contenido de su suscripcion:" . $path);
                //WorkflowController::send_notification($tokens, $message);
        }
        return json_encode(array("tokens"=>$users,"shared"=>$shared));
    }
    
}

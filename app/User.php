<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use DB;
use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'genero', 'ci', 'estado', 'id_dpto', 'id_grupo', 'email', 'password','tema','cbarra','letra'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function usuario()
    {
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $grupo = DB::table('users')
            ->select('users.id_grupo as g')
            ->where('users.email','=',$_SESSION['email'])
            ->first();

        if($grupo->g == 1){
           $admins = DB::table('users as u')
               ->join('departamentos as d','d.id','=','u.id_dpto')
               ->join('institucions as i','i.id','d.id_institucion')
               ->select('u.nombre as nombre','u.apellido as apellido','u.ci as ci','u.email as email','i.nombre as id_institucion')
               ->where('u.id_grupo','=',2)
               ->get();
        }else{
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $admins = DB::table('users as u')
                ->join('departamentos as d','d.id','=','u.id_dpto')
                ->join('institucions as i','i.id','=','d.id_institucion')
                ->select('u.nombre as nombre','u.apellido as apellido','u.ci as ci','u.email as email')
                ->where('d.id_institucion','=',$_SESSION['institucion'])
                ->get();
        }
        return $admins;
    }

    public static function insertar(Request $request){
        $id_grupo=$request->get('groupuser');
        switch ($request->get('groupuser')){
            /////es adm general
            case '1':
                $id_grupo = 2;
                break;
            ////es adm de empresa
            case '2':
                $id_grupo = 3;
                break;
        }

        User::create(
            array(
                'nombre'=>$request->get('nombre'),
                'apellido'=>$request->get('apellido'),
                'genero'=>$request->get('genero'),
                'ci'=>$request->get('ci'),
                'estado'=>'1',
                'id_dpto'=>$request->get('id_dpto'),
                'id_grupo'=>$id_grupo,
                'email'=>$request->get('email'),
                'password'=>bcrypt('123456')
            )
        );
    }

    public static function updateSessionM1(){
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $_SESSION['m1'] = DB::table('grupo_privilegios as gp')
            ->join('cu as c','c.id','=','gp.id_cu')
            ->join('modulo as m','m.id','=','c.id_modulo')
            ->join('grupos as g','g.id','=','gp.id_grupo')
            ->join('users as u','u.id_grupo','=','g.id')
            ->select('id_cu as cu','c.nombre','gp.INSERTAR as I','gp.MODIFICAR as M','gp.ELIMINAR as E','gp.estado','c.ruta')
            ->where('u.email','=',$_SESSION['email'])
            ->where('gp.estado','=',1)
            ->where('m.id','=',1)
            ->get();

        $paquete=$_SESSION['m1'];


        if(count($paquete) > 0){
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['p1'] = 1;
        }else{
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['p1'] = 0;
        }

    }

    public static function updateSessionM2(){
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $_SESSION['m2'] = DB::table('grupo_privilegios as gp')
            ->join('cu as c','c.id','=','gp.id_cu')
            ->join('modulo as m','m.id','=','c.id_modulo')
            ->join('grupos as g','g.id','=','gp.id_grupo')
            ->join('users as u','u.id_grupo','=','g.id')
            ->select('id_cu as cu','c.nombre','gp.INSERTAR as I','gp.MODIFICAR as M','gp.ELIMINAR as E','gp.estado','c.ruta')
            ->where('u.email','=',$_SESSION['email'])
            ->where('gp.estado','=',1)
            ->where('m.id','=',2)
            ->get();


        $paquete=$_SESSION['m1'];


        if($paquete != ""){
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['p2'] = 1;
        }else{
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['p2'] = 0;
        }
    }

    public static function updateSessionM3(){
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $_SESSION['m3'] = DB::table('grupo_privilegios as gp')
            ->join('cu as c','c.id','=','gp.id_cu')
            ->join('modulo as m','m.id','=','c.id_modulo')
            ->join('grupos as g','g.id','=','gp.id_grupo')
            ->join('users as u','u.id_grupo','=','g.id')
            ->select('id_cu as cu','c.nombre','gp.INSERTAR as I','gp.MODIFICAR as M','gp.ELIMINAR as E','gp.estado','c.ruta')
            ->where('u.email','=',$_SESSION['email'])
            ->where('gp.estado','=',1)
            ->where('m.id','=',3)
            ->get();


        $paquete=$_SESSION['m1'];


        if($paquete != ""){
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['p3'] = 1;
        }else{
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['p3'] = 0;
        }
    }

    public static function updateSessionM4(){
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $_SESSION['m4'] = DB::table('grupo_privilegios as gp')
            ->join('cu as c','c.id','=','gp.id_cu')
            ->join('modulo as m','m.id','=','c.id_modulo')
            ->join('grupos as g','g.id','=','gp.id_grupo')
            ->join('users as u','u.id_grupo','=','g.id')
            ->select('id_cu as cu','c.nombre','gp.INSERTAR as I','gp.MODIFICAR as M','gp.ELIMINAR as E','gp.estado','c.ruta')
            ->where('u.email','=',$_SESSION['email'])
            ->where('gp.estado','=',1)
            ->where('m.id','=',4)
            ->get();


        $paquete=$_SESSION['m1'];


        if($paquete != ""){
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['p4'] = 1;
        }else{
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['p4'] = 0;
        }
    }

    public static function updateSessionM5(){
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $_SESSION['m5'] = DB::table('grupo_privilegios as gp')
            ->join('cu as c','c.id','=','gp.id_cu')
            ->join('modulo as m','m.id','=','c.id_modulo')
            ->join('grupos as g','g.id','=','gp.id_grupo')
            ->join('users as u','u.id_grupo','=','g.id')
            ->select('id_cu as cu','c.nombre','gp.INSERTAR as I','gp.MODIFICAR as M','gp.ELIMINAR as E','gp.estado','c.ruta')
            ->where('u.email','=',$_SESSION['email'])
            ->where('gp.estado','=',1)
            ->where('m.id','=',9)
            ->get();

        $paquete=$_SESSION['m1'];


        if($paquete != ""){
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['p5'] = 1;
        }else{
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['p5'] = 0;
        }
    }


    /***
     * Apartir de aqui obtenemos y realizamos los privilegios de los botones para cada usuario
     */
    public static function ObtenerInsertModElimModulo1()
    {

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $grupo = DB::table('users')
            ->select('users.id_grupo as g')
            ->where('users.email', '=', $_SESSION['email'])
            ->first();

        if ($grupo->g == 1) {
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['privbotonesmodulo1'] = DB::table('grupo_privilegios as gp')
                ->join('cu as c', 'c.id', '=', 'gp.id_cu')
                ->join('modulo as m', 'm.id', '=', 'c.id_modulo')
                ->join('grupos as g', 'g.id', '=', 'gp.id_grupo')
                ->join('users as u', 'u.id_grupo', '=', 'g.id')
                ->select('gp.id_cu as id', 'gp.INSERTAR as i', 'gp.MODIFICAR as m', 'gp.ELIMINAR as e')
                ->where('u.email', '=', $_SESSION['email'])
                ->where('gp.estado', '=', 1)
                ->where('m.id', '=', 1)
                ->get();

        } else {
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['institucion'];

            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['privbotonesmodulo1'] = DB::table('grupo_privilegios as gp')
                ->join('cu as c', 'c.id', '=', 'gp.id_cu')
                ->join('modulo as m', 'm.id', '=', 'c.id_modulo')
                ->join('grupos as g', 'g.id', '=', 'gp.id_grupo')
                ->join('users as u', 'u.id_grupo', '=', 'g.id')
                /*->join('departamentos as d','d.id','=','u.id_dpto')*/
                ->select('gp.id_cu as id', 'gp.INSERTAR as i', 'gp.MODIFICAR as m', 'gp.ELIMINAR as e')
                ->where('u.email', '=', $_SESSION['email'])
                /*->where('d.id_institucion','=',$_SESSION['institucion'])*/
                ->where('gp.estado', '=', 1)
                ->where('m.id', '=', 1)
                ->get();
        }
    }

    public static function ObtenerInsertModElimModulo2()
    {

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $grupo = DB::table('users')
            ->select('users.id_grupo as g')
            ->where('users.email', '=', $_SESSION['email'])
            ->first();

        if ($grupo->g == 1) {
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['privbotonesmodulo2'] = DB::table('grupo_privilegios as gp')
                ->join('cu as c', 'c.id', '=', 'gp.id_cu')
                ->join('modulo as m', 'm.id', '=', 'c.id_modulo')
                ->join('grupos as g', 'g.id', '=', 'gp.id_grupo')
                ->join('users as u', 'u.id_grupo', '=', 'g.id')
                ->select('gp.id_cu as id', 'gp.INSERTAR as i', 'gp.MODIFICAR as m', 'gp.ELIMINAR as e')
                ->where('u.email', '=', $_SESSION['email'])
                ->where('gp.estado', '=', 1)
                ->where('m.id', '=', 2)
                ->get();

        } else {
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['institucion'];

            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['privbotonesmodulo2'] = DB::table('grupo_privilegios as gp')
                ->join('cu as c', 'c.id', '=', 'gp.id_cu')
                ->join('modulo as m', 'm.id', '=', 'c.id_modulo')
                ->join('grupos as g', 'g.id', '=', 'gp.id_grupo')
                ->join('users as u', 'u.id_grupo', '=', 'g.id')
                /*->join('departamentos as d','d.id','=','u.id_dpto')*/
                ->select('gp.id_cu as id', 'gp.INSERTAR as i', 'gp.MODIFICAR as m', 'gp.ELIMINAR as e')
                ->where('u.email', '=', $_SESSION['email'])
                /*->where('d.id_institucion','=',$_SESSION['institucion'])*/
                ->where('gp.estado', '=', 1)
                ->where('m.id', '=', 2)
                ->get();
        }
    }

    public static function ObtenerInsertModElimModulo3()
    {

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $grupo = DB::table('users')
            ->select('users.id_grupo as g')
            ->where('users.email', '=', $_SESSION['email'])
            ->first();

        if ($grupo->g == 1) {
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['privbotonesmodulo3'] = DB::table('grupo_privilegios as gp')
                ->join('cu as c', 'c.id', '=', 'gp.id_cu')
                ->join('modulo as m', 'm.id', '=', 'c.id_modulo')
                ->join('grupos as g', 'g.id', '=', 'gp.id_grupo')
                ->join('users as u', 'u.id_grupo', '=', 'g.id')
                ->select('gp.id_cu as id', 'gp.INSERTAR as i', 'gp.MODIFICAR as m', 'gp.ELIMINAR as e')
                ->where('u.email', '=', $_SESSION['email'])
                ->where('gp.estado', '=', 1)
                ->where('m.id', '=', 3)
                ->get();

        } else {
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['institucion'];

            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['privbotonesmodulo3'] = DB::table('grupo_privilegios as gp')
                ->join('cu as c', 'c.id', '=', 'gp.id_cu')
                ->join('modulo as m', 'm.id', '=', 'c.id_modulo')
                ->join('grupos as g', 'g.id', '=', 'gp.id_grupo')
                ->join('users as u', 'u.id_grupo', '=', 'g.id')
                /*->join('departamentos as d','d.id','=','u.id_dpto')*/
                ->select('gp.id_cu as id', 'gp.INSERTAR as i', 'gp.MODIFICAR as m', 'gp.ELIMINAR as e')
                ->where('u.email', '=', $_SESSION['email'])
                /*->where('d.id_institucion','=',$_SESSION['institucion'])*/
                ->where('gp.estado', '=', 1)
                ->where('m.id', '=', 3)
                ->get();
        }
    }

    public static function ObtenerInsertModElimModulo4()
    {

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $grupo = DB::table('users')
            ->select('users.id_grupo as g')
            ->where('users.email', '=', $_SESSION['email'])
            ->first();

        if ($grupo->g == 1) {
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['privbotonesmodulo4'] = DB::table('grupo_privilegios as gp')
                ->join('cu as c', 'c.id', '=', 'gp.id_cu')
                ->join('modulo as m', 'm.id', '=', 'c.id_modulo')
                ->join('grupos as g', 'g.id', '=', 'gp.id_grupo')
                ->join('users as u', 'u.id_grupo', '=', 'g.id')
                ->select('gp.id_cu as id', 'gp.INSERTAR as i', 'gp.MODIFICAR as m', 'gp.ELIMINAR as e')
                ->where('u.email', '=', $_SESSION['email'])
                ->where('gp.estado', '=', 1)
                ->where('m.id', '=', 4)
                ->get();

        } else {
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['institucion'];

            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['privbotonesmodulo4'] = DB::table('grupo_privilegios as gp')
                ->join('cu as c', 'c.id', '=', 'gp.id_cu')
                ->join('modulo as m', 'm.id', '=', 'c.id_modulo')
                ->join('grupos as g', 'g.id', '=', 'gp.id_grupo')
                ->join('users as u', 'u.id_grupo', '=', 'g.id')
                /*->join('departamentos as d','d.id','=','u.id_dpto')*/
                ->select('gp.id_cu as id', 'gp.INSERTAR as i', 'gp.MODIFICAR as m', 'gp.ELIMINAR as e')
                ->where('u.email', '=', $_SESSION['email'])
                /*->where('d.id_institucion','=',$_SESSION['institucion'])*/
                ->where('gp.estado', '=', 1)
                ->where('m.id', '=', 4)
                ->get();
        }
    }

    public static function ObtenerInsertModElimModulo9()
    {

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $grupo = DB::table('users')
            ->select('users.id_grupo as g')
            ->where('users.email', '=', $_SESSION['email'])
            ->first();

        if ($grupo->g == 1) {
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['privbotonesmodulo9'] = DB::table('grupo_privilegios as gp')
                ->join('cu as c', 'c.id', '=', 'gp.id_cu')
                ->join('modulo as m', 'm.id', '=', 'c.id_modulo')
                ->join('grupos as g', 'g.id', '=', 'gp.id_grupo')
                ->join('users as u', 'u.id_grupo', '=', 'g.id')
                ->select('gp.id_cu as id', 'gp.INSERTAR as i', 'gp.MODIFICAR as m', 'gp.ELIMINAR as e')
                ->where('u.email', '=', $_SESSION['email'])
                ->where('gp.estado', '=', 1)
                ->where('m.id', '=', 9)
                ->get();

        } else {
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['institucion'];

            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['privbotonesmodulo9'] = DB::table('grupo_privilegios as gp')
                ->join('cu as c', 'c.id', '=', 'gp.id_cu')
                ->join('modulo as m', 'm.id', '=', 'c.id_modulo')
                ->join('grupos as g', 'g.id', '=', 'gp.id_grupo')
                ->join('users as u', 'u.id_grupo', '=', 'g.id')
                /*->join('departamentos as d','d.id','=','u.id_dpto')*/
                ->select('gp.id_cu as id', 'gp.INSERTAR as i', 'gp.MODIFICAR as m', 'gp.ELIMINAR as e')
                ->where('u.email', '=', $_SESSION['email'])
                /*->where('d.id_institucion','=',$_SESSION['institucion'])*/
                ->where('gp.estado', '=', 1)
                ->where('m.id', '=', 9)
                ->get();
        }
    }

    public static function obteneriduser($email){
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $_SESSION['username'] = DB::table('users')
            ->select('users.id as id','users.tema as t','users.cbarra as c','users.letra as l','users.nombre as n','users.id_grupo as id_grupo')
            ->where('users.email','=',$_SESSION['email'])
            ->first();
    }




    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
        ///////////////////////////////FUNCIONES ANDROID//////////////////////////////////
    public function login($datos){
        $i=0;
        while($datos[$i]!='-'){
            $i++;
        }
        $email = substr($datos,0,$i);
        $password = substr($datos, $i+1,strlen($datos)-($i+1));
        $p = DB::table('users as u')->select('u.id')
                ->where('u.email','=',$email)
                ->get();
            return json_encode(array("result"=>$p));
    }

    public function regToken($datos){
        $i=0;
        while($datos[$i]!='$'){
            $i++;
        }
        $id = substr($datos,0,$i);
        $token = substr($datos, $i+1,strlen($datos)-($i+1));
        DB::table('users')->where('id',$id)
            ->update([
                'token'=>$token
            ]);
        return json_encode(array("id"=>$id,"token"=>$token));
    }

    public function getWorkflow($id){
        // $data = DB::table('workflows as w')
        //         ->join('documentos as doc','doc.id','=','w.id_documento')
        //         ->join('users as creador','creador.id','=','w.id_users')
        //         ->join('workflow_usuarios as wu','wu.id_workflow','=','w.id')
        //         ->join('users as part','part.id','=','wu.id_users')
        //         ->select('w.descripcion as cabdescripcion','w.porcentaje','w.fechaI','w.fechaF','w.prioridad',//datos de cabecera
        //                'wu.descripcion as detdescripcion','wu.fecha as fechaasig', //datos de detalle
        //                'creador.nombre as nombcreador','creador.apellido as apellcreador','creador.ci as cicreador',//datos de creador
        //                'part.nombre as nombpart','part.apellido as apellpart','part.ci as cicreador',//datos de participante
        //                'doc.descripcion as nombdoc','doc.extension')
        //         ->where('part.id','=',$id)
        //         ->get();
         $data = DB::table('workflows as w')
                ->join('documentos as doc','doc.id','=','w.id_documento')
                ->join('workflow_usuarios as wu','wu.id_workflow','=','w.id')
                ->join('users as user','user.id','=','wu.id_users')
                ->select('w.id as idworkflow','w.descripcion as cabdescripcion','w.porcentaje','w.fechaI','w.fechaF','w.prioridad',//datos de cabecera
                         'wu.descripcion as detdescripcion','wu.fecha as fechaasig', //datos de detalle
                         'user.nombre as nombpart','user.apellido as apellpart','user.ci as cicreador',//datos de participante
                         'doc.descripcion as nombdoc','doc.extension')
                ->where('user.id','=',$id)
                ->get();

        return json_encode(array("workflow" => $data));
    }

}

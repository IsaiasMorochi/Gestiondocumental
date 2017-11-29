<?php

namespace App\Http\Middleware;

use App\Bitacora;
use App\Events\llamada;
use App\Http\Controllers\DirectorioController;
use App\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $this->store($request);
        $this->act();
        if (Auth::guard($guard)->check()) {


            return redirect('/home');
        }

        return $next($request);
    }


    public function store(Request $request){
        $archivo = $request->get('email').".txt";
       // $myfile = fopen(public_path()."/".$archivo, "r") or die("Unable to open file!");
       // $PassFile = (fread($myfile,filesize($archivo)));
       // fclose($myfile);

        $password = hash('sha256', $request->get('password')); // password hashing using SHA256

//        if ($PassFile = $password) {
            //return Redirect::to('categoria');
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['email']=$request->get('email');

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $_SESSION['institucion'] = DB::table('users as u')
            ->join('departamentos as d',    'd.id','=','u.id_dpto')
            ->join('institucions as i','i.id','=','d.id_institucion')
            ->select('i.id as id','i.nombre as nombre')
            ->where('u.email','=',$_SESSION['email'])
            ->first();

        $prueba = $_SESSION['institucion'];

            User::updateSessionM1();
            User::updateSessionM2();
            User::updateSessionM3();
            User::updateSessionM4();
            User::updateSessionM5();
            User::ObtenerInsertModElimModulo2();
            User::ObtenerInsertModElimModulo3();
            User::ObtenerInsertModElimModulo4();
            User::ObtenerInsertModElimModulo9();
            User::obteneriduser();


            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['id'] = DB::table('users')
                ->select('users.id as id','users.id_grupo as grupo')
                ->where('users.email','=',$_SESSION['email'])
                ->first();

            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['nombre'] = DB::table('users')
                ->select('users.nombre as nombre')
                ->where('users.email','=',$_SESSION['email'])
                ->first();

            $a = $_SESSION['nombre'];


            $bitacoraf= new Bitacora();
            $bitacoraf->operacion="Inicio sesion";
            $bitacoraf->tabla="users";
            $bitacoraf->usuario=$a->nombre;
            event(new llamada($bitacoraf));

            ///verificar si el q inicia ya tiene directorio para crearlo
        $iduser = $_SESSION['id'];
        if(!is_dir(public_path().'/files/'.$iduser->id)){
            DirectorioController::crearDirPrincipales($iduser->id,$iduser->grupo);
        }

    }

    public function login(Request $request){
        $archivo = $request->get('email').".txt";
        $myfile = fopen(public_path()."/".$archivo, "r") or die("Unable to open file!");
        $PassFile = (fread($myfile,filesize($archivo)));
        fclose($myfile);

        $password = hash('sha`256', $request->get('password')); // password hashing using SHA256

        if ($PassFile = $password) {
            return view();
        }else{
            return "NO SE PUDO";
        }
    }

    public function act(){
        User::obteneriduser();
      //  return view ('Documento.GestionarCategoria.index');
    }
}

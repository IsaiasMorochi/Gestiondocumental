<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use DB;
use App\Bitacora;
use App\Events\llamada;
class LoginController extends Controller
{
    public function index(){

        return view('AdmGeneral.InicioSesion.index');
    }

    public function store(Request $request){
        $archivo = $request->get('email').".txt";
        $myfile = fopen(public_path()."/".$archivo, "r") or die("Unable to open file!");
        $PassFile = (fread($myfile,filesize($archivo)));
        fclose($myfile);

        $password = hash('sha256', $request->get('password')); // password hashing using SHA256

        if ($PassFile = $password) {
            //return Redirect::to('categoria');
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['email']=$request->get('email');
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $_SESSION['institucion'] = DB::table('users as u')
                ->join('departamentos as d','d.id','=','u.id_dpto')
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

           /* return json_encode(array("institucion"=>$prueba));*/

            return view('home');
        }else{
            return "NO SE PUDO";
        }
    }

    public function login(Request $request){
        $archivo = $request->get('email').".txt";
        $myfile = fopen(public_path()."/".$archivo, "r") or die("Unable to open file!");
        $PassFile = (fread($myfile,filesize($archivo)));
        fclose($myfile);

        $password = hash('sha256', $request->get('password')); // password hashing using SHA256

        if ($PassFile = $password) {
            return view();
        }else{
            return "NO SE PUDO";
        }
    }

    public function act(){
        User::obteneriduser();
        return view ('Documento.GestionarCategoria');
    }
}

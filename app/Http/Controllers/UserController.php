<?php 

namespace App\Http\Controllers;

use App\Departamento;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Bitacora;
use App\Events\llamada;


class UserController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $user = User::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('nit', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->orWhere('tipo', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $grupo = DB::table('users')
                ->select('users.id_grupo as g')
                ->where('users.email','=',$_SESSION['email'])
                ->first();

            $user = User::usuario();
            if($grupo->g == 1){
                $casos = DB::table('cu')->get();

                return view('AdmGeneral.UsuarioG.index', compact('user','casos'));
            } else{
                error_reporting(E_ALL and E_NOTICE);
                session_start();
                $_SESSION['institucion'];
                $idins=$_SESSION['institucion'];
                $casos = DB::table('cu')->get();
                $users = DB::table('institucions as i')
                    ->join('departamentos as d','d.id_institucion','=','i.id')
                    ->join('users as u','u.id_dpto','=','d.id')
                    ->select('u.*')
                    ->where('d.id_institucion','=',$idins->id)
                    ->where('u.estado','=','1')
                    ->get();
              //  return json_encode(array("institucion"=>$users));

                return view('Usuario.GestionarUsuario.index', compact('users','casos'));
            }

        }
    }


    public function create()
    {
        error_reporting(E_ALL and E_NOTICE);
            session_start();
            $grupo = DB::table('users')
                ->select('users.id_grupo as g')
                ->where('users.email','=',$_SESSION['email'])
                ->first();

            if($grupo->g == 1){

                $departamentos = DB::table('departamentos as d')
                    ->distinct()
                    ->orderBy('d.id','desc')
                    ->get();

                return view('AdmGeneral.UsuarioG.create', compact('departamentos'));
            } else{
                error_reporting(E_ALL and E_NOTICE);
                session_start();
                $d=$_SESSION['institucion'];
                $departamentos = DB::table('departamentos as d')
                    ->where('d.id_institucion','=',$d->id)
                    ->distinct()
                    ->select('d.id as id','d.nombre as nombre')
                    ->orderBy('d.id','desc')
                    ->get();

                error_reporting(E_ALL and E_NOTICE);
                session_start();
                $d=$_SESSION['institucion'];
                $grupos = DB::table('departamentos as d')
                    ->join('institucions as i','i.id','d.id_institucion')
                    ->join('grupos as g','g.id_institucion','i.id')
                    ->where('g.id_institucion','=',$d->id)
                    ->distinct()
                    ->select('g.id as idg','g.descripcion as nombreg')
                    ->orderBy('g.id','desc')
                    ->get();

              // return json_encode(array("institucion"=>$grupos));

                 return view('Usuario.GestionarUsuario.create',["departamentos"=>$departamentos,"grupo"=>$grupos]);
            }
    }

    public function store(Request $request){
        User::insertar($request);
        $this->archivar($request->get('email'),$request->get('password'));

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $grupo = DB::table('users')
            ->select('users.id_grupo as g')
            ->where('users.email','=',$_SESSION['email'])
            ->first();

        error_reporting(E_ALL and E_NOTICE);
        session_start();

        $a = $_SESSION['nombre'];

        $bitacoraf= new Bitacora();
        $bitacoraf->operacion="Insertar";
        $bitacoraf->tabla="users";
        $bitacoraf->usuario=$a->nombre;
        event(new llamada($bitacoraf));

        if($grupo->g == 1){
            return Redirect::to('AdmGeneral/UsuarioG');
        } else{
            return redirect('Usuario/GestionarUsuario');
        }

    }

    public function archivar($email,$password){
        $myfile = fopen(public_path()."/".$email.".txt", "a") or die("Unable to open file!");
        fwrite($myfile, hash('sha256', $password));
    }

    public function inicio()
    {
        return view('home');
    }

        public function show($id)
    {
        $user = User::findOrFail($id);

        return view('AdmGeneral.GestionarInstitucion.show', compact('user'));
    }
      public function destroy($id){
        $user = User::find($id);
        $user->estado = 0;
        $user->update();

          error_reporting(E_ALL and E_NOTICE);
          session_start();

          $a = $_SESSION['nombre'];

          $bitacoraf= new Bitacora();
          $bitacoraf->operacion="Eliminar";
          $bitacoraf->tabla="users";
          $bitacoraf->usuario=$a->nombre;
          event(new llamada($bitacoraf));
        return  back();
    }

}

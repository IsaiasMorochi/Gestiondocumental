<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Bitacora;
use App\Events\llamada;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Array_;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');



        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $a = $_SESSION['nombre'];
        $bitacoraf= new Bitacora();
        $bitacoraf->operacion="cerrar sesion";
        $bitacoraf->tabla="users";
        $bitacoraf->usuario="$a->nombre";
        event(new llamada($bitacoraf));

        //User::actualizarUsuarioO();
        User::actualizarUsuarioB();





    }


}

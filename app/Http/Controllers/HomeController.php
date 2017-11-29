<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
  /*      error_reporting(E_ALL and E_NOTICE);
        session_start();
       $id= $_SESSION['id'];
       User::actualizarUsuarioO();
       return json_encode((array("sdf"=>$id)));*/
        return view('home');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bitacora;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $institucion=$_SESSION['institucion'];

        $data = file_get_contents("BITACORA.json");
        $products = json_decode($data,true);
        if($institucion->id==null){
            return view('Herramienta.ConsultarBitacora.index',["producto"=>$products]);
        }else{
            $myfile1 = fopen(public_path()."/"."prueba".".json", "w") or die("Unable to open file!");
            fwrite($myfile1,"[");
            fclose($myfile1);
            foreach ($products as $product) {
                //$idinst=$product['idinstitucion'];
                if($institucion->id==$product['idinstitucion']){
                    $bitacora= new Bitacora();
                    $bitacora->id_bitacora=$product['id_bitacora'];
                    $bitacora->operacion=$product['operacion'];
                    $bitacora->tabla=$product['tabla'];
                    $bitacora->hora=$product['hora'];
                    $bitacora->usuario=$product['usuario'];
                    $bitacora->idinstitucion=$product['idinstitucion'];


                    $myfile1 = fopen(public_path()."/"."prueba".".json", "a") or die("Unable to open file!");
                    fwrite($myfile1, ($bitacora).",");
                    fclose($myfile1);

                }


            }
            $bitacora= new Bitacora();
            $bitacora->id_bitacora='';
            $bitacora->operacion='';
            $bitacora->tabla='';
            $bitacora->hora='';
            $bitacora->usuario='';
            $bitacora->idinstitucion='';


            $myfile1 = fopen(public_path()."/"."prueba".".json", "a") or die("Unable to open file!");
            fwrite($myfile1, ($bitacora));
            fclose($myfile1);

            $myfile1 = fopen(public_path()."/"."prueba".".json", "a") or die("Unable to open file!");
            fwrite($myfile1, ("]"));
            fclose($myfile1);
            $data = file_get_contents("prueba.json");
            $productos = json_decode($data,true);
            return view('Herramienta.ConsultarBitacora.index',["producto"=>$productos]);

        }




    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Listeners;
use App\Bitacora;

use App\Events\llamada;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

class bitacoras
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  llamada  $event
     * @return void
     */
    public function handle(llamada $event)
    {
//aqui obtenemos la institucion
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $institucion= $_SESSION['institucion'];


        // protected $fillable = ['id_bitacora', 'operacion','tabla','hora'];

//este es  ultimo valor a insertar
        $bitacoraf= new Bitacora();

        $bitacoraf->operacion=$event->bitacora->operacion;
        $bitacoraf->tabla=$event->bitacora->tabla;
        $mytime = Carbon::now('America/La_Paz');
        $bitacoraf->hora=$mytime->toTimeString();
        $bitacoraf->usuario=$event->bitacora->usuario;
        $bitacoraf->idinstitucion=$institucion->id;
//--------------aqui obtenemos el valor del archivo el codigo jason--------------------------------------------------
        $data = file_get_contents("BITACORA.json");
        $products = json_decode($data, true);
        $cont=0;
//        aqui abrimos y booramos los datos del archivo
        $myfile = fopen(public_path()."/"."BITACORA".".json", "w") or die("Unable to open file!");
//aqui insertamos cada valor del jason al archivo
        fwrite($myfile,"[");
        fclose($myfile);
        foreach ($products as $product) {
            $bitacora= new Bitacora();
            $bitacora->id_bitacora=$product['id_bitacora'];
            $bitacora->operacion=$product['operacion'];
            $bitacora->tabla=$product['tabla'];
            $bitacora->hora=$product['hora'];
            $bitacora->usuario=$product['usuario'];
            $bitacora->idinstitucion=$product['idinstitucion'];


            $myfile1 = fopen(public_path()."/"."BITACORA".".json", "a") or die("Unable to open file!");
            fwrite($myfile1, ($bitacora).",");
            fclose($myfile1);
            $cont=$cont+1;
        }
        $bitacoraf->id_bitacora=$cont+1;
        $myfile = fopen(public_path()."/"."BITACORA".".json", "a") or die("Unable to open file!");
        fwrite($myfile, ($bitacoraf)."]");
        fclose($myfile);

    }

}
